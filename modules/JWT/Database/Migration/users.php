<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('users', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("name")->nullable();
    $table->string("family")->nullable();
    $table->unsignedBigInteger("department_id")->nullable();
    $table->unsignedBigInteger("role_id");
    $table->string("phone")->nullable();
    $table->string("city")->nullable();
    $table->integer("verify_code")->nullable();
    $table->boolean("two_factor_login")->default(false);
    $table->string("country")->nullable();
    $table->string("address")->nullable();
    $table->string("email")->nullable();
    $table->string("site")->nullable();
    $table->string("password")->nullable();
    $table->string("token")->unique();
    $table->bigInteger("credit")->default(0);
    $table->string("status")->default("active");
    $table->timestamps();
});
