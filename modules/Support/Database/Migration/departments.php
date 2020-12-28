<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;
use Module\Support\Model\Department;

DB::schema()->create('departments', function (Blueprint $table) {
    $table->id();
    $table->string("title");
    $table->string("slug");
    $table->timestamps();
});
Department::create(["title" => "پشتیبانی فنی", "slug" => "support.technical"]);