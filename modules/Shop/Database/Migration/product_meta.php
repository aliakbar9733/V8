<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('product_meta', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger("product_id");
    $table->string("key");
    $table->text("value")->nullable();
    $table->timestamps();
    $table->foreign("product_id")->references("id")->on("products")->onDelete("CASCADE");

});
