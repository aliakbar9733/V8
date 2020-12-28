<?php


namespace Module\JWT\Controller;


use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\{JWT, Model\Role, Model\User};


class UserApiController
{
    /**
     * Get user data
     * @return User|null
     */
    public function get()
    {
        return JWT::getUser();
    }

    /**
     * Get user role
     * @return Role
     */
    public function role()
    {
        return JWT::getUser()->role();
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function login(Request $request)
    {
        //Validate Request
        validate($request->all(), ["password" => "required", "email" => "required_if:phone,null|email", "phone:required_if:email,null"]);
        $email = $request->input("email");
        $phone = $request->input("phone");
        $user = User::login($phone ? $phone : $email, $request->input("password"));
        if (!$user)
            return Submitter::error(__("jwt.wrongEmailOrPassword", "Wrong Email Or Phone Or Password"));

        /*
         * If Two Step Login Is Active
         */
        if ($user->twoFactorIsActive()) {
            $user->verify();
            return (new Submitter(true, "Two Factor Sms Send"))->setDataAttribute(["twoFactor" => true])->send();
        }

        /*
         * Set Session for Web users
         */
        !$request->input("session") ?: JWT::setSessionUser($user);

        /*
         * Make Visible Hidden Fields in Json
         */
        $user->makeVisible([User::TOKEN, User::PHONE, User::EMAIL, User::CREDIT, User::ADDRESS]);

        return (new Submitter(true, __("jwt.SuccessfulLogin", "Login Successful")))->setDataAttribute($user)->actionAlert("swal", $request->input("redirect"), "success")->send();

    }

    public function phoneLogin(Request $request)
    {
        //Validate Request
        validate($request->all(), ["phone" => "required"]);

        $user = User::where(User::PHONE, $request->input("phone"))->first();
        if (!$user)
            return Submitter::error(__("jwt.wrongPhone", "Wrong Phone"));
        $user->verify();
        return Submitter::swalRedirect(__("jwt.verifyUser", "Sms Was Send.Verify User"));
    }

    public function verifyPhoneLogin(Request $request)
    {
        //Validate Request
        validate($request->all(), ["phone" => "required", "code" => ["required", "integer", "size:5"]]);

        $user = User::where(User::PHONE, $request->input("phone"))
            ->where(User::VERIFY_CODE, $request->input("code"))
            ->first();

        if (!$user)
            return Submitter::error(__("jwt.wrongPhone", "Wrong Phone"));

        $user->update([User::VERIFY_CODE => null]);

        /*
        * Set Session for Web users
        */
        !$request->input("session") ?: JWT::setSessionUser($user);

        /*
         * Make Visible Hidden Fields in Json
         */
        $user->makeVisible([User::TOKEN, User::PHONE, User::EMAIL, User::CREDIT, User::ADDRESS]);

        return (new Submitter(true, __("jwt.SuccessfulLogin", "Login Successful")))
            ->setDataAttribute($user)
            ->actionAlert("toastr", $request->input("redirect"), "success")
            ->send();
    }
}