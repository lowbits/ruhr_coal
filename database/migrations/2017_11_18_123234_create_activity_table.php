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
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('weather')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('location_id');
            $table->string('opening_hours')->nullable();
            $table->string('category')->nullable();
            $table->float('price')->nullable();
            $table->boolean('student_discount')->nullable();
            $table->integer('person_count')->nullable();
            $table->boolean('is_public')->nullable();
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
