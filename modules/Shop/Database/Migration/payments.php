<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('payments', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->bigInteger("user_id")->nullable();
    $table->bigInteger("amount")->nullable();
    $table->string("ref_id")->nullable();
    $table->string("getway")->nullable();
    $table->string("authority");
    $table->string("title")->nullable();
    $table->string("description")->nullable();
    $table->text("data")->nullable();
    $table->string("success")->nullable();
    $table->timestamps();
});

