<?php


namespace Core;

use Illuminate\Database\Capsule\Manager;

/**
 * Class Module
 * @package Core
 * Modules Core
 */
final class Module
{
    private function getModuleList()
    {
        return config("modules");
    }

    private function autoload($moduleDir)
    {
        require_once BASEDIR . "/modules/" . $moduleDir . "/" . $moduleDir . ".php";
    }

    private function loadRouter($moduleDir)
    {
        $routerPath = BASEDIR . "/modules/" . $moduleDir . "/router.php";
        if (file_exists($routerPath))
            require_once $routerPath;
    }

    private function startModule($moduleClass)
    {
        return new $moduleClass();
    }

    private function loadModules()
    {
        foreach ($this->getModuleList() as $moduleDir => $moduleClass) {
            $this->autoload($moduleDir);
            $this->loadRouter($moduleDir);
        }
    }

    private function startModules()
    {
        foreach ($this->getModuleList() as $moduleDir => $moduleClass) {
            $module = $this->startModule($moduleClass);
            if ($this->isFirstTimeRun($moduleDir))
                if (method_exists($module, "onActivate"))
                    $module->onActivate();
        }
    }

    private function isFirstTimeRun($moduleDir)
    {
        $moduleConfig = $this->getModuleConfig($moduleDir);
        if (isset($moduleConfig->firstTime) and $moduleConfig->firstTime) {
            $moduleConfig->firstTime = false;
            $this->setModuleConfig($moduleDir, json_encode($moduleConfig));
            return true;
        }
        if (isset($moduleConfig->mainTable) and !Manager::schema()->hasTable($moduleConfig->mainTable) and env("DEBUG", false)) {
            return true;
        }
        return false;
    }

    private function setModuleConfig($moduleDir, $config)
    {
        file_put_contents(BASEDIR . "/modules/" . $moduleDir . "/config.json", $config);
    }

    private function getModuleConfig($moduleDir)
    {
        return json_decode(file_get_contents(BASEDIR . "/modules/" . $moduleDir . "/config.json"));
    }

    private function initialize()
    {
        $this->loadModules();
        $this->startModules();
    }

    public static function run()
    {
        (new self)->initialize();
    }


}