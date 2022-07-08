<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies')->middleware('auth');
Route::get('/companies/create', [App\Http\Controllers\CompaniesController::class, 'create'])->name('companies.create')->middleware('auth');
Route::post('/companies/store', [App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.store')->middleware('auth');
Route::get('/companies/{company}/edit', [App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit')->middleware('auth');
Route::post('/companies/{company}/update', [App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.update')->middleware('auth');
Route::delete('/companies/{company}/destroy', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('companies.destroy')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees')->middleware('auth');
Route::get('/employees/create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('employees.create')->middleware('auth');
Route::post('/employees/store', [App\Http\Controllers\EmployeesController::class, 'store'])->name('employees.store')->middleware('auth');
Route::get('/employees/{employee}/edit', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('employees.edit')->middleware('auth');
Route::post('/employees/{employee}/update', [App\Http\Controllers\EmployeesController::class, 'update'])->name('employees.update')->middleware('auth');
Route::delete('/employees/{employee}/destroy', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('employees.destroy')->middleware('auth');


Auth::routes();
