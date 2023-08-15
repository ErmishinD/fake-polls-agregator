<?php

require 'bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('poll_options', function ($table) {
       $table->increments('id');
       $table->string('text');
       $table->integer('votes_count')->unsigned()->default(0);
       $table->integer('poll_id')->unsigned();
       $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
   });