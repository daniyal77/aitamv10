<?php

use Illuminate\Support\Facades\Route;
use Modules\Vacation\App\Http\Controllers\VacationController;

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

Route::resource('vacation', VacationController::class)->except('show')->names('vacation');

Route::get('vacation-checked', [VacationController::class, 'checked'])->name('vacation.checked');
Route::get('vacation-unchecked', [VacationController::class, 'unchecked'])->name('vacation.unchecked');
