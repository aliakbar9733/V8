<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('meals', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("title");
    $table->string("start");
    $table->string("end");
    $table->string("status")->default("active");
    $table->timestamps();
});
