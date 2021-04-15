<?php

use App\Http\Controllers\AirportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\FlightsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('airlines')->group(function () {
    Route::get('list', [AirlinesController::class, 'index'])->middleware(['auth'])->name('airlines_list');
    Route::get('create',[AirlinesController::class,'create'])->middleware(['auth'])->name('airlines_create');
    Route::post('store',[AirlinesController::class,'store'])->middleware(['auth'])->name('airlines_store');
    Route::get('edit/{id}',[AirlinesController::class,'edit'])->middleware(['auth'])->name('airlines_edit');
    Route::put('update/{id}',[AirlinesController::class,'update'])->middleware(['auth'])->name('airlines_update');
    Route::delete('delete/{id}',[AirlinesController::class,'destroy'])->middleware(['auth'])->name('airlines_delete');
    });

    Route::prefix('airport')->group(function () {
        Route::get('list', [AirportsController::class, 'index'])->middleware(['auth'])->name('airport_list');
        Route::get('create',[AirportsController::class,'create'])->middleware(['auth'])->name('airport_create');
        Route::post('store',[AirportsController::class,'store'])->middleware(['auth'])->name('airport_store');
        Route::get('edit/{id}',[AirportsController::class,'edit'])->middleware(['auth'])->name('airport_edit');
        Route::put('update/{id}',[AirportsController::class,'update'])->middleware(['auth'])->name('airport_update');
        Route::delete('delete/{id}',[AirportsController::class,'destroy'])->middleware(['auth'])->name('airport_delete');
    });
    Route::prefix('flight')->group(function () {
        Route::get('list', [ FlightsController::class, 'index'])->middleware(['auth'])->name('flight_list');
        Route::get('create',[FlightsController::class,'create'])->middleware(['auth'])->name('flight_create');
        Route::post('store',[FlightsController::class,'store'])->middleware(['auth'])->name('flight_store');
        Route::get('edit/{id}',[FlightsController::class,'edit'])->middleware(['auth'])->name('flight_edit');
        Route::put('update/{id}',[FlightsController::class,'update'])->middleware(['auth'])->name('flight_update');
        Route::delete('delete/{id}',[FlightsController::class,'destroy'])->middleware(['auth'])->name('flight_delete');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
