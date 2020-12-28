<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;


DB::schema()->create('tickets', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("title");
    $table->unsignedBigInteger("user_id")->nullable();
    $table->unsignedBigInteger("receiver_id")->nullable();
    $table->unsignedBigInteger("department_id")->nullable();
    $table->boolean("read")->default(0);
    $table->string("status")->nullable();
    $table->timestamps();
    $table->foreign("user_id")->references("id")->on("users")->onDelete("set Null");
    $table->foreign("receiver_id")->references("id")->on("users")->onDelete("set Null");
    $table->foreign("department_id")->references("id")->on("departments")->onDelete("set Null");
});
