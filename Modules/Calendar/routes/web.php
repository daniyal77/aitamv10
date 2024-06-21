<?php

use Illuminate\Support\Facades\Route;
use Modules\Calendar\App\Http\Controllers\CalendarController;

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


Route::controller(CalendarController::class)->prefix('calendar')->name('calendar.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::delete('/destroy', 'destroy')->name('destroy');
    Route::get('/api', 'api')->name('api');
    Route::get('/delete-after-two-year', 'deleteAfterTwoYear')->name('delete.after.year');
});
