<?php

use Module\{JWT\JWT, Kavenegar\Kavenegar, Restaurant\Restaurant, Shop\Shop, Support\Support};

return [
    /**
     * User & Authenticate Module By Aliakbar Soleimani
     */
    "JWT" => JWT::class,

    /**
     * Kavenegar Sms Service
     */
    "Kavenegar" => Kavenegar::class,

    /**
     * Ticket System
     */
    "Support" => Support::class,

    /**
     * Shop Module
     */
    "Shop" => Shop::class,

    /**
     * Restaurant Module
     */
    "Restaurant" => Restaurant::class
];