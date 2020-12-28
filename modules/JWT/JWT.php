<?php


namespace Module\JWT;


use Core\App;
use Module\JWT\Model\User;

require_once __DIR__ . "/vendor/autoload.php";

/**
 * Class JWT
 * @package Module\JWT
 */
final class JWT
{
    const USER = "user";
    private static ?User $user;

    public function __construct()
    {
    }

    public function onActivate()
    {
        $this->tables();
    }

    public function tables()
    {
        migrate("roles", dirname(__FILE__));
        migrate("users", dirname(__FILE__));
    }

    public static function getSessionUser()
    {
        if (isset($_COOKIE[self::USER]))
            return $_COOKIE[self::USER];
        return null;
    }

    public static function setSessionUser($user)
    {
        setcookie(self::USER, $user->token, time() + 1296015, "/");
        return $user;
    }

    public static function unsetSessionUser()
    {
        setcookie(self::USER, "", time() - 3600, "/");
    }

    public static function updateSessionUser()
    {
        return User::auth(self::getSessionUser());
    }

    public static function getBearerToken()
    {
        return trim(App::request()->bearerToken());
    }

    public static function getHeaderUser()
    {
        $token = @$_REQUEST[User::TOKEN] ?: self::getBearerToken();
        return User::auth($token);
    }

    public static function getUser()
    {
        if (isset(self::$user))
            return self::$user;
        $token = @$_REQUEST[User::TOKEN] ?: self::getBearerToken();
        return self::$user = User::auth($token ? $token : self::getSessionUser());
    }

}