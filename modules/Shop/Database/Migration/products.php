<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('products', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("name");
    $table->text("description")->nullable();
    $table->string("price")->default(0);
    $table->string("special_price")->nullable();
    $table->integer("priority")->default(0);
    $table->string("images")->nullable();
    $table->string("type")->default("virtual");
    $table->string("status")->default("active");
    $table->timestamps();
});
