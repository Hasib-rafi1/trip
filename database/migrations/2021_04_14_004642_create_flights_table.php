<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * "airline": "AC",
    "number": "301",
    "departure_airport": "YUL",
    "departure_time": "07:35",
    "arrival_airport": "YVR",
    "arrival_time": "10:05",
    "price": "273.23"
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('airline');
            $table->foreign('airline')->references('code')->on('airlines');
            $table->integer('number');
            $table->string('departure_airport');
            $table->foreign('departure_airport')->references('code')->on('airports');
            $table->string('departure_time');
            $table->string('arrival_airport');
            $table->foreign('arrival_airport')->references('code')->on('airports');
            $table->string('arrival_time');
            $table->float('price');
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
        Schema::dropIfExists('flights');
    }
}
