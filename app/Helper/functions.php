<?php

use App\Helper\Validator;
use Core\{App, Hook, Menu, Translation, View};

/**
 * Get Engine Main Class Instance
 * @return App
 */
function app()
{
    return App::instance();
}

/**
 * Get project url
 * @param string|null $uri Uri Slug
 * @return string
 */
function url(string $uri = null)
{
    return App::url($uri);
}

/**
 * Get project configs
 * @param $name string Config file name
 * @return array
 */
function config(string $name): array
{
    return require BASEDIR . "/config/" . $name . ".php";
}

/**
 * Blade helper function
 * @param $view
 * @param array $data
 * @return Exception|string
 */
function view($view, $data = [])
{
    return View::instance()->make($view, $data);
}

/**
 * I18N helper
 * @param $key
 * @param null $default
 * @param null $locale
 * @return array|mixed|string|null
 */
function __($key, $default = null, $locale = null)
{
    return Translation::instance()->translate($key, $locale, $default);
}

/**
 * Redirect to new url
 * @param $url
 * @return bool|void
 */
function redirect($url = null)
{
    $url = strtolower(substr($url, 0, 4)) != "http" ? App::url($url) : $url;
    header("Location: {$url}");
    exit;
    return true;
}

/**
 * Validate Http Requests
 * @param $data
 * @param $rules
 * @param bool $exit
 * @param array $messages
 * @param array $attributes
 * @return bool|\Illuminate\Validation\Validator|void
 */
function validate($data, $rules, $exit = true, $messages = [], $attributes = [])
{
    return Validator::make($data, $rules, $exit, $messages, $attributes);
}

/**
 * Migrate database tables
 * @param $migration string Migration file name
 * @param $moduleDir string Module Dirname
 */
function migrate(string $migration, string $moduleDir)
{
    require_once $moduleDir . "/Database/Migration/" . $migration . ".php";
}

/**
 * Run Hook After Load All Modules
 * @param $hook
 * @param mixed ...$args
 */
function hook($hook, ...$args)
{
    Hook::runAfterHook($hook, ...$args);
}

/**
 * @param $slug
 * @param $title
 * @param $url
 * @param string $parent
 * @param null $permission
 * @param null $icon
 * Add Item To Dashboard Sidebar
 * @param int $priority
 */
function menu($slug, $title, $url, $parent = "", $permission = null, $icon = null, $priority = 0)
{
    Menu::add($slug, $title, $url, $parent, $permission, $icon, $priority);
}