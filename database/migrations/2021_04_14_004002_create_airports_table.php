<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *"code": "YUL",
    "city_code": "YMQ",
    "name": "Pierre Elliott Trudeau International",
    "city": "Montreal",
    "country_code": "CA",
    "region_code": "QC",
    "latitude": 45.457714,
    "longitude": -73.749908,
    "timezone": "America/Montreal"
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('city_code');
            $table->string('name');
            $table->string('city');
            $table->string('country_code');
            $table->string('region_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('timezone');
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
        Schema::dropIfExists('airports');
    }
}
