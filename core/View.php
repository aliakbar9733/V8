<?php


namespace Core;


use eftec\bladeone\BladeOne;
use Exception;
use Module\JWT\JWT;

/**
 * Class View
 * @package Core
 */
class View
{
    /**
     * @var View
     */
    private static self $instance;
    public BladeOne $blade;
    const RESOURCE_PATH = BASEDIR . "/resources";
    const BASE_VIEW_PATH = self::RESOURCE_PATH . "/View";
    const COMPILE_PATH = self::BASE_VIEW_PATH . "/cache";

    private function __construct()
    {

        $this->blade = new BladeOne($this->getViewPaths(), self::COMPILE_PATH, $this->compileMode());
        $this->blade->directive("assets", function () {
            return url("assets");
        });
        $this->blade->directive("url", function () {
            return url();
        });
    }

    private function compileMode()
    {
        return env("DEBUG", false) ? BladeOne::MODE_DEBUG : BladeOne::MODE_AUTO;
    }

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone()
    {
    }

    private function getModulesViewPaths()
    {
        $modules = config("modules");
        $paths = [];
        foreach ($modules as $module => $moduleClass) {
            $paths[] = BASEDIR . "/modules/" . $module . "/View";
        }
        return $paths;
    }

    private function getViewPaths()
    {
        $paths = $this->getModulesViewPaths();
        $paths[] = self::BASE_VIEW_PATH;
        return array_reverse($paths);
    }

    public function make($view = null, $data = [])
    {
        /*
         * Bind User To All Views
         */
        $data[JWT::USER] = JWT::getUser();

        /*
         * Compile View
         */
        try {
            return $this->blade->run($view, $data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function abort($code, $msg)
    {
        return false;
    }
}