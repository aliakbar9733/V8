<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('product_categories', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger("product_id");
    $table->unsignedBigInteger("category_id");
    $table->timestamps();
    $table->foreign("product_id")->references("id")->on("products")->onDelete("CASCADE");
    $table->foreign("category_id")->references("id")->on("categories")->onDelete("CASCADE");
});

