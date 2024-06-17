<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\App\Http\Controllers\EmployeeController;
use Modules\Employee\App\Http\Controllers\EmployeeRequestController;

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

Route::resource('employee', EmployeeController::class)->names('employee');
Route::get('employee-trash', [EmployeeController::class, 'trash'])->name('employee.trash');


Route::resource('employee-request', EmployeeRequestController::class)->names('employee.request');
