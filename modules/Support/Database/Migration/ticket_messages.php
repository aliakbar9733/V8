<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;


DB::schema()->create('ticket_messages', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->unsignedBigInteger("ticket_id");
    $table->unsignedBigInteger("user_id");
    $table->string("text", 4000)->nullable();
    $table->text("files")->nullable();
    $table->timestamps();
    $table->foreign("ticket_id")->references("id")->on("tickets")->onDelete("CASCADE");
});
