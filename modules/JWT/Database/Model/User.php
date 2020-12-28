<?php


namespace Module\JWT\Model;


use App\Model\Meta;
use Core\Model;

/**
 * @property mixed role_id
 * @property mixed phone
 * @property mixed two_factor_login
 */
class User extends Model
{
    const  EMAIL = "email", PASSWORD = "password", CREDIT = "credit", ADDRESS = "address", ROLE_ID = "role_id", TOKEN = "token", PHONE = "phone", VERIFY_CODE = "verify_codes";

    protected $fillable = [self::ROLE_ID, self::TOKEN];
    protected $hidden = [self::PASSWORD, self::ROLE_ID, self::PHONE, self::TOKEN, User::EMAIL, User::CREDIT, self::UPDATED_AT, self::ADDRESS];
    const TOKEN_PREFIX = "V8_";

    public static function auth($token)
    {
        return self::where(self::TOKEN, $token)->first();
    }

    public static function login($email, $password)
    {
        return self::where(self::EMAIL, $email)->where(self::PASSWORD, $password)->first();
    }

    public function verify()
    {
        $verifyCode = rand(0, 99999);
        hook("sms", $this->phone, "login", $verifyCode);
        return $this->update([User::VERIFY_CODE, $verifyCode]);
    }

    public function twoFactorIsActive()
    {
        return $this->two_factor_login;
    }

    public function role()
    {
        return Role::find($this->role_id);
    }

    public function withRole()
    {
        $this->with("role");
        return $this;
    }

    public function metas()
    {
        return $this->morphMany(Meta::class, "metaable");
    }

    public function getMeta($key)
    {
        return $this->metas()->where(Meta::KEY, $key)->first();
    }

    public function setMeta($key, $value, $update = true)
    {
        $meta = $this->getMeta($key);
        if ($meta and $update) {
            $meta->update([Meta::VALUE => $value]);
            return $meta;
        }
        return $this->metas()->create([Meta::KEY => $key, Meta::VALUE => $value]);
    }

    public function can($scope)
    {
        if ($scope == "")
            return true;
        $scopes = $this->role()->getScopes();
        if (in_array($scope, $scopes))
            return true;
        return false;
    }
}