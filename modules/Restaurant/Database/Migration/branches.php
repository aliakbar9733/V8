<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('branches', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("name");
    $table->string("latitude")->nullable();
    $table->string("longitude")->nullable();
    $table->integer("tax")->nullable();
    $table->string("min_buy")->default(0);
    $table->unsignedBigInteger("admin_id");
    $table->unsignedBigInteger("order_id")->nullable();
    $table->text("address")->nullable();
    $table->string("image")->nullable();
    $table->string("status")->default("active");
    $table->timestamps();
    $table->foreign("admin_id")->references("id")->on("users");
    $table->foreign("order_id")->references("id")->on("users");
});

