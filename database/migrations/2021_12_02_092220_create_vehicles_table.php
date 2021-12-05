<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('price');
            $table->string('image_url')->nullable();
            $table->integer('persons');
            $table->integer('doors');
            $table->integer('liters_per_km');
            $table->string('licence_number');
            $table->bigInteger('model_id')->unsigned();
            $table->date('production_year');
            $table->integer('mileage');
            $table->date('date_of_registration');
            $table->enum('veteran', array('yes', 'no'));
            $table->string('brand');
            $table->string('description')->nullable();
            $table->timestamps();
            //$table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('vehicles');
    }
}
