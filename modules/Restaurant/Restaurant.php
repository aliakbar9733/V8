<?php


namespace Module\Restaurant;

use Core\App;
use Core\View;
use Module\JWT\JWT;
use Module\JWT\Model\Role;
use Module\Restaurant\Model\Branch;

require_once __DIR__ . "/vendor/autoload.php";

class Restaurant
{

    public function __construct()
    {
        $this->menu();
        $this->directives();
    }

    public function menu()
    {
        $userBranchId = $this->getUserBranchId();
        if ($userBranchId) {
            menu("restaurant", __("restaurant.restaurant", "Restaurant"), "", "", "branch.*", "icon-cup");
            menu("foods", __("restaurant.foods", "Foods"), "", "restaurant");
            menu("add-food", __("restaurant.addFood", "Add Food"), "food/create/{$userBranchId}", "foods");
            menu("manage-foods", __("base.manage", "Manage"), "food/{$userBranchId}", "foods");
            menu("restaurant-orders", __("shop.orders", "Orders"), "branch/{$userBranchId}/orders", "restaurant", "branch.orders");
        }
        menu("meals", __("restaurant.meals", "Meals"), "meal", "shop");
        menu("branches", __("restaurant.branches", "Branches"), "", "", "branch", "icon-map");
        menu("add-branch", __("restaurant.addBranch", "Add Branch"), "branch/create", "branches", "branch");
        menu("manage-branches", __("base.manage", "Manage"), "branch", "branches", "branch");
    }

    public function directives()
    {
        View::instance()->blade->directive("shopAssets", function () {
            return App::url("module/Restaurant");
        });
    }

    public function onActivate()
    {
        $this->tables();
        $this->roles();
    }

    public function tables()
    {
        migrate("branches", dirname(__FILE__));
        migrate("meals", dirname(__FILE__));
    }

    public function roles()
    {
        Role::create([Role::TITLE => "branch.admin", Role::NAME => "مدیر شعبه", Role::SCOPES => json_encode(["branch.*", "branch.orders"])]);
        Role::create([Role::TITLE => "branch.orders", Role::NAME => "سفارشات شعبه", Role::SCOPES => json_encode(["branch.orders"])]);
    }

    public function getUserBranchId()
    {
        $user = @JWT::getUser();
        if ($user) {
            $role = $user->role();
            $branch = Branch::where(Branch::ADMIN_ID, $user->id)->orWhere(Branch::ORDER_ID, $user->id)->first();
            if ($branch)
                return $branch->id;
        }
        return null;
    }
}