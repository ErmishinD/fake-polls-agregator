<?php

require 'bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('polls', function ($table) {
       $table->increments('id');
       $table->string('title');
       $table->string('status')->default('draft');
       $table->integer('user_id')->unsigned();
       $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       $table->timestamps();
   });