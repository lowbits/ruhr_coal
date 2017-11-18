<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('type')->nullable();
            $table->boolean('indoor')->nullable();
            $table->boolean('outdoor')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('adress')->nullable();
            $table->string('telephone')->nullable();
            $table->string('url')->nullable();
            $table->string('photo_url')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
