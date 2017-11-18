<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('weather')->nullable();
            $table->unsignedInteger('creator_id');
            $table->string('opening_hours')->nullable();
            $table->float('price');
            $table->boolean('student_discount')->nullable();
            $table->unsignedInteger('location_id');
            $table->integer('person_count')->nullable();
            $table->boolean('isPublic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
