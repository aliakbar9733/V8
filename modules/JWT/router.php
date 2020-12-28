<?php

use Core\App;
use Module\JWT\{Controller\UserApiController,
    Controller\UserWebController,
    Middleware\ApiAuthenticate,
    Middleware\NonWebAuthenticate,
    Middleware\WebAuthenticate};


$router = App::router();

/*
 * Api Routes
 */
$router->group(["prefix" => "api/user"], function () use ($router) {
    $router->get("", [UserApiController::class, "get"]);
    $router->get("role", [UserApiController::class, "role"])->middleware(ApiAuthenticate::class);
    $router->post("store", [UserApiController::class, "store"]);
    $router->post("login", [UserApiController::class, "login"]);

    //Need Kavenegar Plugin
    $router->post("login/phone", [UserApiController::class, "phoneLogin"]);
    $router->post("verify", [UserApiController::class, "verifyPhoneLogin"]);
});

/*
 * Web Routes (Views)
 */
$router->group(["prefix" => "user/"], function () use ($router) {
    $router->get("login", [UserWebController::class, "login"])->middleware(NonWebAuthenticate::class);
    $router->get("register", [UserWebController::class, "register"])->middleware(NonWebAuthenticate::class);
    $router->get("logout", [UserWebController::class, "logout"])->middleware(WebAuthenticate::class);
});


