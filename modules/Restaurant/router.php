<?php

use Core\App;
use Module\JWT\Middleware\{ApiAuthenticate, Can, WebAuthenticate};
use Module\Restaurant\Controller\{BranchController, FoodController, FrontendController, MealController};
use Module\Restaurant\Middleware\{BranchAccess, FoodAccess};


$router = App::router();

/**
 * Branches Api Routes
 */
$router->group(["prefix" => "api/branch", "middleware" => [ApiAuthenticate::class]], function () use ($router) {
    /*
     * Create New Branch
     * Permission : branch
     */
    $router->post("store", [BranchController::class, "store"])
        ->middleware(Can::class . ":branch");

    /*
     * Update Exiting Branch
     * Permission : branch|branch.*
     */
    $router->post("{branch}", [BranchController::class, "update"])
        ->middleware(BranchAccess::class)
        ->where("branch", "[0-9]+");

    /*
     * Get All Branches List
     */
    $router->get("all", [BranchController::class, "getAll"]);

    /*
     * Get Branch with Branch Foods
     */
    $router->get("{branch}", [BranchController::class, "get"])
        ->where("branch", "[0-9]+");
});

/**
 * Foods Api Routes
 */
$router->group(["prefix" => "api/food", "middleware" => [ApiAuthenticate::class]], function () use ($router) {
    /*
     * Create New Food For Exiting Branch
     * Permission : branch|branch.*
     */
    $router->post("store/{branch}", [FoodController::class, "store"])
        ->middleware(BranchAccess::class)
        ->where("branch", "[0-9]+");

    /*
     * Update Exiting Branch Food
     * Permission : branch|branch.*
     */
    $router->post("update/{food}", [FoodController::class, "update"])
        ->middleware(FoodAccess::class)
        ->where("food", "[0-9]+");
    /*
     * Get Food
     */
    $router->get("get/{food}", [FoodController::class, "get"]);
});

/**
 * Meals Api Routes
 */
$router->group(["prefix" => "api/meal", "middleware" => [ApiAuthenticate::class]], function () use ($router) {
    /*
     * Create New Meal
     * Permission : meal
     */
    $router->post("store", [MealController::class, "store"])->middleware(Can::class . ":meal");

    /*
     * Update Exiting Meal
     * Permission : meal
     */
    $router->post("update/{meal}", [MealController::class, "update"])
        ->middleware(Can::class . ":meal")
        ->where("meal", "[0-9]+");
});

/**
 * Web Routes
 * --------------------------------------------------------------------------------------------------------------------------
 */
/*
 * Front Pages
 */
$router->group([], function () use ($router) {
    $router->get("", [FrontendController::class, "index"]);
});
/*
 * Branch Dashboard Routes
 */
$router->group(["prefix" => "branch", "middleware" => [WebAuthenticate::class]], function () use ($router) {
    /*
     * Branch List View
     * Permission : branch
     */
    $router->get("", [BranchController::class, "index"])->middleware(Can::class . ":branch");

    /*
     * Create Branch View
     * Permission : branch
     */
    $router->get("create", [BranchController::class, "create"])->middleware(Can::class . ":branch");

    /*
     * Edit Branch View
     * Permission : branch|branch.*
     */
    $router->get("{branch}/edit", [BranchController::class, "edit"])->middleware(BranchAccess::class);
});

/*
 * Food Dashboard Routes
 */
$router->group(["prefix" => "food", "middleware" => [WebAuthenticate::class]], function () use ($router) {
    /*
     * Branch Foods List View
     * Permission : branch|branch.*
     */
    $router->get("{branch}", [FoodController::class, "index"])->middleware(BranchAccess::class);

    /*
     * Create Food For Branches
     * Permission : branch|branch.*
     */
    $router->get("create/{branch}", [FoodController::class, "create"])->middleware(BranchAccess::class);

    /*
     *
     */
    $router->get("{food}/edit", [FoodController::class, "edit"])->middleware(FoodAccess::class);
});

/*
 * Meal Dashboard Routes
 */
$router->group(["prefix" => "meal", 'middleware' => [WebAuthenticate::class]], function () use ($router) {
    /*
     * Meals List View
     */
    $router->get("", [MealController::class, "index"])->middleware(Can::class . ":meal");

    /*
     * Meal Edit View
     */
    $router->get("{meal}/edit", [MealController::class, "edit"])->middleware(Can::class . ":meal");

    /*
     * Meal Create View
     */
    $router->get("create", [MealController::class, "create"])->middleware(Can::class . ":meal");
});