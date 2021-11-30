<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\userController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\laporanController;

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

Route::get('/barang',[barangController::class,'index']);
Route::post('/item/create',[barangController::class,'create']);
Route::post('/item/update',[barangController::class,'update'])->name('update');
Route::get('/item/delete/{id_barang}',[barangController::class,'delete']);

Route::get('/penjualan',[penjualanController::class,'index']);
// Route::get('/penjualan/action',array('as'=>'data_penjualan', 'uses'=>'penjualanController@data_penjualan'));

Route::get('/penjualan/action',[penjualanController::class,'action'])->name('data_penjualan.action');

Route::get('/pembelian/autofill',[penjualanController::class,'index'])->name('autofill');

Route::get('/pembelian',[pembelianController::class,'index']);

Route::get('/laporan',[laporanController::class,'index']);
Route::post('/laporan',[laporanController::class,'refresh']);

Route::get('/findCustomers', [penjualanController::class, 'getCustomer']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/api/barang/{id}',[penjualanController::class,'getBarangId']);
