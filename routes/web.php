<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CekResiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontEndController;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\DestinationController;
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
Route::get('/', [FrontEndController::class, 'index']);
Route::get('/jpc-express/cekresi', [FrontEndController::class, 'cekresi']);
Route::get('/jpc-express/cekestimasi', [FrontEndController::class, 'cekestimasi']);
Route::get('/jpc-express/cetak_order', [FrontEndController::class, 'cetak_order']);

Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/profile/ubah', [UserController::class, 'ubah_profile']);
Route::put('/profile/update', [UserController::class, 'update_profile']);
Route::get('/profile/ubah/password', [UserController::class, 'ubah_password']);
Route::put('/profile/update/password', [UserController::class, 'update_password']);


//Data Pelanggan
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/dt', [CustomerController::class, 'dt']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::get('customer/edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/destroy/{id}', [CustomerController::class, 'destroy']);


//Data Barang
// Route::get('/barang', [BarangController::class, 'index']);
// Route::get('/barang/dt', [BarangController::class, 'dt']);
// Route::get('/barang/create', [BarangController::class, 'create']);
// Route::post('/barang/store', [BarangController::class, 'store']);
// Route::get('barang/edit/{id}', [BarangController::class, 'edit']);
// Route::put('/barang/update/{id}', [BarangController::class, 'update']);
// Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy']);

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
Route::get('status_pengiriman/detail/{penjualan_id}', [StatusPengirimanController::class, 'detail']);
Route::get('status_pengiriman/edit/{id}', [StatusPengirimanController::class, 'edit']);
Route::put('/status_pengiriman/update/{id}', [StatusPengirimanController::class, 'update']);
Route::get('/status_pengiriman/destroy/{id}', [StatusPengirimanController::class, 'destroy']);

//Data Vendor
Route::get('/vendor', [VendorController::class, 'index']);
Route::get('/vendor/dt', [VendorController::class, 'dt']);
Route::get('/vendor/create', [VendorController::class, 'create']);
Route::post('/vendor/store', [VendorController::class, 'store']);
Route::get('vendor/edit/{id}', [VendorController::class, 'edit']);
Route::put('/vendor/update/{id}', [VendorController::class, 'update']);
Route::get('/vendor/destroy/{id}', [VendorController::class, 'destroy']);

//Data Order
Route::get('/order', [PenjualanController::class, 'index']);
Route::get('/order/dt', [PenjualanController::class, 'dt']);
Route::get('/order/create', [PenjualanController::class, 'create']);
Route::post('/order/store', [PenjualanController::class, 'store']);
Route::get('order/edit/{id}', [PenjualanController::class, 'edit']);
Route::put('/order/update/{id}', [PenjualanController::class, 'update']);
Route::get('/order/destroy/{id}', [PenjualanController::class, 'destroy']);
Route::get('/order/notif/{id}', [PenjualanController::class, 'notif']);

//Data Destinasi
Route::get('/destinasi', [DestinationController::class, 'index']);
Route::get('/destinasi/dt', [DestinationController::class, 'dt']);
Route::get('/destinasi/create', [DestinationController::class, 'create']);
Route::post('/destinasi/store', [DestinationController::class, 'store']);
Route::get('destinasi/edit/{id}', [DestinationController::class, 'edit']);
Route::put('/destinasi/update/{id}', [DestinationController::class, 'update']);
Route::get('/destinasi/destroy/{id}', [DestinationController::class, 'destroy']);

//Data Kurir
Route::get('/kurir', [KurirController::class, 'index']);
Route::get('/kurir/dt', [KurirController::class, 'dt']);
Route::get('/kurir/create', [KurirController::class, 'create']);
Route::post('/kurir/store', [KurirController::class, 'store']);
Route::get('kurir/edit/{id}', [KurirController::class, 'edit']);
Route::put('/kurir/update/{id}', [KurirController::class, 'update']);
Route::get('/kurir/destroy/{id}', [KurirController::class, 'destroy']);


//Cetak Laporan
Route::get('/order/cetak_laporan', [PenjualanController::class, 'form_cetak_laporan']);
Route::post('/order/cetak_laporan', [PenjualanController::class, 'cetak_laporan']);


});

Route::group(['middleware' => 'auth', 'prefix' => 'kurir'], function(){
    Route::get('/status_pengiriman', [StatusPengirimanController::class, 'index_kurir']);
    Route::get('/status_pengiriman/dt', [StatusPengirimanController::class, 'dt_kurir']);
    Route::get('status_pengiriman/edit/{id}', [StatusPengirimanController::class, 'edit_kurir']);
    Route::put('/status_pengiriman/update/{id}', [StatusPengirimanController::class, 'update_kurir']);


});

Route::get('/kirim-email', [NotifikasiController::class, 'email']);

Route::get('/test', function()
{
	$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
	$beautymail->send('emails.welcome', [], function($message)
	{
		$message
			->from('seputarit01@gmail.com')
			->to('habsyi.ikhlashulariq@gmail.com', 'Habsyi Ikhlashul Ariq')
			->subject('Selamat!');
	});

});

//Login
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
