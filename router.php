<?php
/**
 * @var $router Router
 */

use App\Controller\BaseController;
use Illuminate\Routing\Router;
use Module\JWT\Middleware\WebAuthenticate;

$router->group(["prefix" => "dashboard", 'middleware' => [WebAuthenticate::class]], function () use ($router) {
    $router->get("", [BaseController::class, "view"]);
});
