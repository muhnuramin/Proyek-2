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
Route::get('/home',[mainController::class,'index'])->name('home');
Route::get('/user',[userController::class,'index'])->name('user');
Route::post('/user/create',[userController::class,'create']);
Route::post('/user/update',[userController::class,'update'])->name('update.id');
Route::get('/user/delete/{id}',[userController::class,'delete']);

Route::get('/barang',[barangController::class,'index'])->name('barang');
Route::post('/item/create',[barangController::class,'create']);
Route::post('/item/update',[barangController::class,'update'])->name('update');
Route::get('/item/delete/{id_barang}',[barangController::class,'delete']);

Route::get('/penjualan',[penjualanController::class,'index'])->name('penjualan');
Route::post('/penjualan/create',[penjualanController::class,'create'])->name('tambah-penjualan');
Route::get('/penjualan/autofill',[penjualanController::class,'autocomplete'])->name('autocomplete');
Route::get('/penjualan/delete/{id_penjualan}',[penjualanController::class,'delete']);
Route::get('/penjualan/clear',[penjualanController::class,'clear']);

Route::get('/pembelian',[pembelianController::class,'index'])->name('pembelian');
Route::post('/pembelian/create',[pembelianController::class,'create'])->name('tambah-pembelian');
Route::get('/pembelian/delete/{id_pembelian}',[pembelianController::class,'delete']);
Route::get('/pembelian/clear',[pembelianController::class,'clear']);

Route::get('/laporan',[laporanController::class,'index'])->name('laporan');
Route::post('/laporan',[laporanController::class,'refresh']);
Route::get('/laporan/data/{awal}/{akhir}',[laporanController::class,'data']->name('laporan.data'));


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/api/barang/{id}',[penjualanController::class,'getBarangId']);