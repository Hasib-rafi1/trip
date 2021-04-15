<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsPerTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights_per_trip', function (Blueprint $table) {
            $table->id();
            $table->string('airline_code');
            $table->foreign('airline_code')->references('airline')->on('flights');
            $table->integer('flight_number');
            $table->float('price');
            $table->boolean('way_to_destination');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips');
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
        Schema::dropIfExists('flights_per_trip');
    }
}
