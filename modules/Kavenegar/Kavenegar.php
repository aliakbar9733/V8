<?php

namespace Module\Kavenegar;

use Core\Hook;
use Kavenegar\KavenegarApi;

require_once __DIR__ . "/vendor/autoload.php";

/**
 * Class Kavenegar
 * @package Module\Kavenegar
 */
final class Kavenegar
{
    const TOKEN = "";
    const TYPE = "sms";

    private KavenegarApi $kavenegar;

    public function __construct()
    {
        $this->kavenegar = new KavenegarApi(self::TOKEN);
        $this->registerHooks();
    }

    public function lookUp($receptor, $template, $token, $token2 = "", $token3 = "", $type = self::TYPE)
    {
        return $this->kavenegar->VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
    }

    private function registerHooks()
    {
        Hook::setAfterHook("sms", function (...$args) {
            $this->lookUp(...$args);
        });
    }
}