<?php
/**
 * V8 Engine
 * Modular Engine Powered By PHP
 * @copyright 2020 Aliakbar Soleimani
 * @author Aliakbar Soleimani Tadi
 * +989139002087
 */

use Core\{App, Hook, Module, ServiceProviderBootstrap};

define("V8_START", microtime(true));
define("BASEDIR", __DIR__);

/*
 * Load Composer Packages
 */
require_once "vendor/autoload.php";

/*
 * Run Project
 */
$app = ServiceProviderBootstrap::run();

/*
 * Run Modules
 */
Module::run();

/*
 * Invoke Request
 */
$app->invoke(App::request(), App::router());

/*
 * Call After Hooks
 */
Hook::runCalledAfterHooks();