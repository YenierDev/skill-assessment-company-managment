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

Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'all_companies'])->name('all_companies');
Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'all_employees'])->name('all_employees');

