<?php
/**
 * @copyright Aliakbar Soleimani 2020
 */

namespace Core;


use Illuminate\{Http\Request, Routing\Router, Validation\Factory as Validator};

/**
 * Class App
 * @package Core
 * Project Base Core
 */
final class App
{
    /**
     * @var App $instance Main Application Instance
     */
    private static self $instance;
    public Router $router;
    public Request $request;
    public Validator $validator;
    public string $locale;

    private function __construct()
    {
    }

    private static function urlProtocol()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://";
    }

    public static function url($uri = null)
    {
        $path = env("URI_PATH");
        $url = $uri ? $path . $uri : substr($path, 0, strlen($path) - 1);
        return self::urlProtocol() . $_SERVER["HTTP_HOST"] . "/" . $url;
    }

    public static function setMode($debug = null)
    {
        $debug = is_null($debug) ? env("DEBUG", false) : $debug;
        if ($debug) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(0);
        }
    }

    public static function instance()
    {
        return !isset(self::$instance) ? self::$instance = new self() : self::$instance;
    }

    public static function router()
    {
        return self::instance()->router;
    }

    public static function request()
    {
        return self::instance()->request;
    }

    public static function validator()
    {
        return self::instance()->validator;
    }

    public static function getLocale()
    {
        return self::instance()->locale;
    }

    public static function setLocale($locale)
    {
        self::instance()->locale = $locale;
    }

}
