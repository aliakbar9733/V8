<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('categories', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->unsignedBigInteger("parent_id")->nullable();
    $table->string("title");
    $table->string("slug")->nullable();
    $table->string("type")->nullable();
    $table->string("image")->nullable();
    $table->string("status")->default("active");
    $table->timestamps();
});

