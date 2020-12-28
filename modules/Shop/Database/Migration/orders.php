<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('orders', function (Blueprint $table) {
    $table->bigIncrements("id");
    $table->unsignedBigInteger("user_id")->nullable();
    $table->unsignedBigInteger("payment_id")->nullable();
    $table->bigInteger("amount")->default(0);
    $table->string("delivery")->nullable();
    $table->string("status")->nullable();
    $table->timestamps();
    $table->foreign("user_id")->references("id")->on("users")->onDelete("CASCADE");
    $table->foreign("payment_id")->references("id")->on("payments")->onDelete("CASCADE");
});