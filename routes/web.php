<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\userController;
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
Route::get('/home',[mainController::class,'index']);
Route::get('/user',[userController::class,'index']);
Route::post('/user/create',[userController::class,'create']);
Route::post('/user/update',[userController::class,'update'])->name('update.id');
Route::get('/user/delete/{id}',[userController::class,'delete']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
