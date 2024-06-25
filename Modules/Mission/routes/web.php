<?php

use Illuminate\Support\Facades\Route;
use Modules\Mission\App\Http\Controllers\MissionController;

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

Route::group([], function () {
    Route::resource('mission', MissionController::class)->names('mission');

    Route::get('mission-checked/{missionId}', [MissionController::class, 'checked'])->name('mission.checked');
    Route::get('mission-unchecked/{missionId}', [MissionController::class, 'unchecked'])->name('mission.unchecked');

});
