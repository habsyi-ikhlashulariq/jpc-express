<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MetodePembayaranController;

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
    return view('master.dashboard');
});

//Data Pelanggan
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/dt', [CustomerController::class, 'dt']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::get('customer/edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/destroy/{id}', [CustomerController::class, 'destroy']);


//Data Pelanggan
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/dt', [BarangController::class, 'dt']);
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::get('barang/edit/{id}', [BarangController::class, 'edit']);
Route::put('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy']);

//Data Metode Pembayaran
Route::get('/metode_pembayaran', [MetodePembayaranController::class, 'index']);
Route::get('/metode_pembayaran/dt', [MetodePembayaranController::class, 'dt']);
Route::get('/metode_pembayaran/create', [MetodePembayaranController::class, 'create']);
Route::post('/metode_pembayaran/store', [MetodePembayaranController::class, 'store']);
Route::get('metode_pembayaran/edit/{id}', [MetodePembayaranController::class, 'edit']);
Route::put('/metode_pembayaran/update/{id}', [MetodePembayaranController::class, 'update']);
Route::get('/metode_pembayaran/destroy/{id}', [MetodePembayaranController::class, 'destroy']);