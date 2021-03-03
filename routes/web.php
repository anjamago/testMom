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

Route::get('/',  [\App\Http\Controllers\AppServiceController::class, 'index'])->name("home");
Route::get('/home',  [\App\Http\Controllers\AppServiceController::class, 'index'])->name("home");
Route::get('/create',  [\App\Http\Controllers\AppServiceController::class, 'create'])->name("create");
Route::post('/store',  [\App\Http\Controllers\AppServiceController::class, 'store'])->name("register");
Route::get('/edit/{id}',  [\App\Http\Controllers\AppServiceController::class, 'show'])->name("edit");
Route::post('/update/{id}',  [\App\Http\Controllers\AppServiceController::class, 'update'])->name("update");
Route::get('/delete/{id}',  [\App\Http\Controllers\AppServiceController::class, 'destroy'])->name("delete");

Route::get('/logs',  [\App\Http\Controllers\AppServiceController::class, 'listLog'])->name("log");





