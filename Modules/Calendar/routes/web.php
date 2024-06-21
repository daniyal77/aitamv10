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

Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [CalendarController::class, 'index'])->name('calendar.store');
Route::delete('calendar', [CalendarController::class, 'index'])->name('calendar.destroy');
Route::get('calendar/api', [CalendarController::class, 'api'])->name('calendar.api');

