<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\landing\HomeController;
use App\http\Controllers\landing\MobilController;
use App\http\Controllers\landing\DetailMobilController;
use App\http\Controllers\landing\TransaksiController;
use App\http\Controllers\LoginController;
use App\http\Controllers\landing\RegisterController;


use App\http\Controllers\Dashboard\DashboardController;
use App\http\Controllers\Dashboard\UsersController;
use App\http\Controllers\Dashboard\KendaraanController;
use App\http\Controllers\Dashboard\PemesananController;
use App\http\Controllers\Dashboard\JadwalController;


Route::group(['middleware' => ['auth','ceklevel:User']], function(){
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
});

#LANDING PAGE
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/daftar-kendaraan', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/daftar-mobil', [DetailMobilController::class, 'index'])->name('detail-mobil.index');
Route::get('/search',[HomeController::class, 'search'])->name('home.search');
Route::get('/daftar-kendaraan/search', [MobilController::class, 'search'])->name('mobil.search');

Route::get('/detail/{id}/{nama_kendaran}', [MobilController::class, 'show']);
Route::post('/booking', [MobilController::class, 'store']);
Route::get('/detail/{id}/{nama_kendaran}', [HomeController::class, 'show']);


#Login dan Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/registrasi', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/sign-in', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/logout-user', [LoginController::class, 'logoutUser']);




Route::group(['middleware' => ['auth','ceklevel:Admin,Super Admin']], function(){

    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('.index');

    // KENDARAAN
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('Kendaraan');
    Route::get('/tambah-kendaraan', [KendaraanController::class, 'insert']);
    Route::post('/add-kendaraan', [KendaraanController::class, 'store']);
    Route::get('/hapus/{id_mobil}', [KendaraanController::class, 'hapus']);

    // PEMESANAN
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('order');
    Route::get('/tambah-pemesanan', [PemesananController::class, 'insert']);
    Route::post('/add-pemesanan', [PemesananController::class, 'store']);
    Route::get('/approve/{id_pemesanan}',[PemesananController::class,'approve']);

    // JADWAL
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/print/{id_pemesanan}',[JadwalController::class,'kwitansi']);

});


Route::group(['middleware' => ['auth','ceklevel:Super Admin']], function(){
    // USERS
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/add-users', [UsersController::class, 'store']);

});















