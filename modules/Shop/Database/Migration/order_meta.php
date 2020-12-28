<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('order_meta', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger("order_id");
    $table->string("key");
    $table->text("value")->nullable();
    $table->timestamps();
    $table->foreign("order_id")->references("id")->on("orders")->onDelete("CASCADE");

});
