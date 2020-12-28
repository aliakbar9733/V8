<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('order_products', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->unsignedBigInteger("order_id")->nullable();
    $table->unsignedBigInteger("product_id")->nullable();
    $table->string("data", 4000)->nullable();
    $table->string("price")->nullable();
    $table->integer("quantity")->default(1);
    $table->timestamps();
    $table->foreign("order_id")->references("id")->on("orders")->onDelete("CASCADE");
    $table->foreign("product_id")->references("id")->on("products")->onDelete("CASCADE");
});

