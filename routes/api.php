<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('airports', 'App\Http\Controllers\AirportsController@airportList');
Route::get('airlines', 'App\Http\Controllers\AirlinesController@airlineList');
Route::get('tripbuild', 'App\Http\Controllers\TripController@build');
Route::get('individual/trip', 'App\Http\Controllers\TripController@individual');


