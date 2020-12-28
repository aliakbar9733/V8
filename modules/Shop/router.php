<?php

use Core\App;
use Module\JWT\Middleware\{ApiAuthenticate, Can, WebAuthenticate};
use Module\Shop\Controller\{CategoryController, ShopController};

$router = App::router();

/**
 * Shop Main Routes
 */
$router->group(["prefix" => "shop", "middleware" => [WebAuthenticate::class]], function () use ($router) {
    /*
     * Shop Main Settings View
     * Permission : shop.admin
     */
    $router->get("settings", [ShopController::class, "settings"])->middleware(Can::class . ":shop.admin");
});

/**
 * Category Api Routes
 */
$router->group(["prefix" => "api/category", "middleware" => [ApiAuthenticate::class]], function () use ($router) {
    /*
     * Store New Category
     * Permission : category
     */
    $router->post("store", [CategoryController::class, "store"])->middleware(Can::class . ":category");

    /*
     * Update Exiting Category
     * Permission : category
     */
    $router->post("update/{category}", [CategoryController::class, "update"])->middleware(Can::class . ":category");
});

/**
 * Category View Routes
 */
$router->group(["prefix" => "category", "middleware" => [WebAuthenticate::class]], function () use ($router) {

    /*
     * Category List View
     */
    $router->get("", [CategoryController::class, "index"])->middleware(Can::class . ":category");
    /*
     * Category Create View
     */
    $router->get("create", [CategoryController::class, "create"])->middleware(Can::class . ":category");
    /*
     * Category Edit View
     */
    $router->get("{category}/edit", [CategoryController::class, "edit"])->middleware(Can::class . ":category");
});