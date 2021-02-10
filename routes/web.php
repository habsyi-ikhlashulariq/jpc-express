<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\StatusPengirimanController;

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

//Data Status Pengiriman
Route::get('/status_pengiriman', [StatusPengirimanController::class, 'index']);
Route::get('/status_pengiriman/dt', [StatusPengirimanController::class, 'dt']);
Route::get('/status_pengiriman/create', [StatusPengirimanController::class, 'create']);
Route::post('/status_pengiriman/store', [StatusPengirimanController::class, 'store']);
Route::get('status_pengiriman/edit/{id}', [StatusPengirimanController::class, 'edit']);
Route::put('/status_pengiriman/update/{id}', [StatusPengirimanController::class, 'update']);
Route::get('/status_pengiriman/destroy/{id}', [StatusPengirimanController::class, 'destroy']);

//Data Status Pengiriman
Route::get('/vendor', [VendorController::class, 'index']);
Route::get('/vendor/dt', [VendorController::class, 'dt']);
Route::get('/vendor/create', [VendorController::class, 'create']);
Route::post('/vendor/store', [VendorController::class, 'store']);
Route::get('vendor/edit/{id}', [VendorController::class, 'edit']);
Route::put('/vendor/update/{id}', [VendorController::class, 'update']);
Route::get('/vendor/destroy/{id}', [VendorController::class, 'destroy']);