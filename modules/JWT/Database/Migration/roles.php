<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;
use Module\JWT\Model\Role;

DB::schema()->create('roles', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("title")->unique();
    $table->string("name");
    $table->string("scopes");
    $table->timestamps();
});

Role::create(["id" => 1, "title" => "admin", "name" => "Admin", "scopes" => json_encode(Role::ADMIN_SCOPES)]);
Role::create(["id" => 2, "title" => "user", "name" => "User", "scopes" => json_encode([])]);
