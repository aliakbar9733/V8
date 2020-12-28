<?php

use Core\App;
use Module\JWT\Middleware\ApiAuthenticate;
use Module\Support\{Controller\SupportApiController, Middleware\TicketAccess, Middleware\TicketReadStatus};

$router = App::router();
/*
 * Api Routes
 */
$router->group(["prefix" => "api/support", "middleware" => [ApiAuthenticate::class]], function () use ($router) {
    $router->get("get/{ticket}", [SupportApiController::class, "get"])
        ->where("ticket", "[0-9]+")
        ->middleware([TicketAccess::class,TicketReadStatus::class]);
    $router->post("store", [SupportApiController::class, "store"]);
});