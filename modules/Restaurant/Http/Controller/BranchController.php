<?php


namespace Module\Restaurant\Controller;

use App\Helper\File;
use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\Model\User;
use Module\Restaurant\Model\Branch;

class BranchController
{
    public function index()
    {
        return view("branch.index", ["branches" => Branch::all()]);
    }

    public function store(Request $request)
    {
        $fields = $request->all(["name", "latitude", "longitude", "min_buy", "tax", "admin_id", "order_id", "address"]);
        validate($fields, array_merge(["admin_id" => ["required"]], $this->rules()));

        /*
         * Validate Admin & Orders User
         */
        if ($fields["admin_id"] == $fields["order_id"]) {
            return Submitter::error(__("restaurant.branchAdminError", "Order & Admin User Cant Be Same"));
        }
        $adminUser = User::findOrFail($fields["admin_id"]);

        $orderUser = null;
        if (isset($fields["order_id"]) and $fields["order_id"] != "") {
            $orderUser = User::where(User::ROLE_ID, "!=", 1)->findOrFail($fields["order_id"]);
        } else {
            $fields["order_id"] = null;
        }

        /*
         * Validate & Store image
         */
        if ($request->hasFile("image")) {
            validate($request->all(["image"]), ["image" => ["file", "max:2048", "mimes:jpeg,png,jpg"]]);
            $fields["image"] = File::instance($request->file("image"))->store("branch");
        }

        Branch::store($fields, $adminUser, $orderUser);
        return Submitter::toastRedirect(__("restaurant.branchCreated", "Branch Created Successful"), "branch", "success");
    }

    public function edit($branchId)
    {
        /*
         * Validate Branch
         */
        $branch = Branch::findOrFail($branchId);
        $users = User::where(User::ROLE_ID, '!=', 1)->whereNotIn(User::ID, Branch::getBranchesAdmins())->get();
        return view("branch.update", compact("branch", "users"));
    }

    public function update(Request $request, $branchId)
    {
        /*
         * Validate Request
         */
        $fields = $request->all(["name", "latitude", "longitude", "min_buy", "tax", "admin_id", "order_id", "address"]);
        validate($fields, $this->rules());

        /*
         * Validate & Store image
         */
        if ($request->hasFile("image")) {
            validate($request->all(["image"]), ["image" => ["file", "max:2048", "mimes:jpeg,png,jpg"]]);
            $fields["image"] = File::instance($request->file("image"))->store("branch");
        }

        /*
         * Validate Branch
         */
        $branch = Branch::findOrFail($branchId);

        /*
         * Validate Admin User
         */
        if ($fields["admin_id"] != "") {
            $adminUser = User::findOrFail($fields["admin_id"]);
            /*
             * Rollback Current Admin To Common User
             */
            $branch->getAdminUser()->update([User::ROLE_ID => 2]);
            /*
             * Change New Admin Role
             */
            $adminUser->update([User::ROLE_ID => Branch::getBranchAdminRole()->id]);
        } else {
            unset($fields["admin_id"]);
        }

        /*
         * Validate Order User
         */
        if ($fields["order_id"] != "") {
            $orderUser = User::findOrFail($fields["order_id"]);
            /*
             * Rollback Current Order User To Common User
             */
            $branch->getOrderUser()->update([User::ROLE_ID => 2]);
            /*
             * Change New Order User Role
             */
            $orderUser->update([User::ROLE_ID => Branch::getBranchOrderRole()->id]);
        } else {
            unset($fields["order_id"]);
        }

        /*
         * Update Branch
         */
        $branch->update($fields);

        return Submitter::swalRedirect(__("restaurant.branchUpdated", "Branch Updated Successful"), "branch", "success");
    }

    /**
     * Get Branch Data (For Mobile App)
     * @param $branchId
     * @return false|string
     */
    public function get($branchId)
    {
        /*
         * Validate Branch
         */
        $branch = Branch::find($branchId);
        if (!$branch)
            return Submitter::error(__("restaurant.branchWrong", "Branch Was Wrong"));

        return $branch->withFoods();
    }

    public function create()
    {
        $users = User::where(User::ROLE_ID, '!=', 1)->whereNotIn(User::ID, Branch::getBranchesAdmins())->get();
        return view("branch.create", compact("users"));
    }

    public function delete($branchId)
    {
        Branch::findOrFail($branchId)->delete();

        return Submitter::toastRedirect(__("base.deleteSuccessful", "Item Deleted Successfully"), "branch");
    }

    public function getAll()
    {
        return Branch::get();
    }

    /**
     * Branch Main Request Rules
     * @return string[]
     */
    public function rules()
    {
        return ["name" => "required",
            "latitude" => "required",
            "address" => "required",
            "longitude" => "required",
            "min_buy" => "required"];
    }
}