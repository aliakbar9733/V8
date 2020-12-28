<?php


namespace Module\Shop;


require_once __DIR__ . "/vendor/autoload.php";

class Shop
{
    public function __construct()
    {
        $this->menu();
    }

    public function onActivate()
    {
        $this->tables();
    }

    public function menu()
    {
        menu("shop", __("shop.shop", "Shop"), "", "", "shop.admin", "icon-basket");
        menu("orders", __("shop.orders", "Orders"), "order", "shop");
        menu("shop-category", __("shop.category", "Categories"), "category", "shop", "category");
        menu("shop-settings", __("base.settings", "Shop Settings"), "shop/settings", "shop", "shop.admin", "");
    }

    public function tables()
    {
        migrate("products", dirname(__FILE__));
        migrate("categories", dirname(__FILE__));
        migrate("product_categories", dirname(__FILE__));
        migrate("product_meta", dirname(__FILE__));
        migrate("payments", dirname(__FILE__));
        migrate("orders", dirname(__FILE__));
        migrate("order_products", dirname(__FILE__));
        migrate("order_meta", dirname(__FILE__));
    }
}