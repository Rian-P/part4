<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\http\Controllers\Dashboard\JadwalController;
use App\Http\Controllers\Dashboard\KendaraanController;
use App\Http\Controllers\Dashboard\PemesananController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Landing\DetailMobilController;
use App\Http\Controllers\Landing\HomeController;
use App\http\Controllers\Landing\MobilController;
use App\Http\Controllers\Landing\TransaksiController;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'ceklevel:User']], function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::put('/upload-transaksi/{id_pemesanan}', [TransaksiController::class, 'update'])->name('upload-transaksi');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/daftar-kendaraan', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/daftar-mobil', [DetailMobilController::class, 'index'])->name('detail-mobil.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/daftar-kendaraan/search', [MobilController::class, 'search'])->name('mobil.search');

Route::post('/booking', [MobilController::class, 'store']);

Route::get('/get-disabled-dates/{nama_kendaraan}', function ($namaKendaraan) {
    $datesForDisable = Pemesanan::where('nama_kendaraan', $namaKendaraan)
        ->pluck('tanggal_ambil')
        ->toArray();

    return response()->json(['dates' => $datesForDisable]);
});
Route::get('/get-disabled-dates1/{nama_kendaraan}', function ($namaKendaraan) {
    $datesForDisable = Pemesanan::where('nama_kendaraan', $namaKendaraan)
        ->pluck('tanggal_kembali')
        ->toArray();

    return response()->json(['dates' => $datesForDisable]);
});
Route::pattern('id', '[0-9]+');
Route::get('/{id}', [HomeController::class, 'show']);

Route::group(['middleware' => ['auth', 'ceklevel:Super Admin,Admin,Sopir']], function () {
    // JADWAL
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::post('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/selesai/{id_pemesanan}', [JadwalController::class, 'selesai']);
});

Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function () {

   
    // KENDARAAN
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('Kendaraan');
    Route::get('/tambah-kendaraan', [KendaraanController::class, 'insert']);
    Route::post('/add-kendaraan', [KendaraanController::class, 'store']);
    Route::get('/update-kendaraan{id_mobil}', [KendaraanController::class, 'updateView'])->name('update.view');
    Route::put('/edit-kendaraan/{id_mobil}', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('/hapus/{id_mobil}', [KendaraanController::class, 'hapus'])->name('kendaraan.hapus');
//dataharga
Route::get('/dataharga', [PemesananController::class, 'lihatharga'])->name('lihatharga');
Route::post('/update-dataharga', [PemesananController::class, 'updatedataharga'])->name('update-dataharga');
    //pengeluaran
    Route::post('/tambah-pengeluaran', [JadwalController::class, 'tambahpengeluaran'])->name('pengeluaran');
    Route::get('/pengeluaran', [JadwalController::class, 'pengeluaran'])->name('pengeluaran');
    Route::get('/hapus/{id}', [JadwalController::class, 'hapuspengeluaran'])->name('hapuspengeluaran');
    // PEMESANAN
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('order');
    Route::get('/tambah-pemesanan', [PemesananController::class, 'insert']);
    
    Route::post('/add-pemesanan', [PemesananController::class, 'store']);
    Route::put('/approve/{id_pemesanan}', [PemesananController::class, 'approve'])->name('upprove');
    Route::put('/batal/{id_pemesanan}', [PemesananController::class, 'batal'])->name('batalkan');
    Route::put('/edit-sopir/{id}', [PemesananController::class, 'updateSopir']);
    Route::get('/hapus-pemesanan/{id}', [PemesananController::class, 'hapus']);

});

Route::group(['middleware' => ['auth', 'ceklevel:Super Admin']], function () {
    Route::get('/report', [JadwalController::class, 'report']);
    Route::get('/pemasukan', [JadwalController::class, 'pemasukan'])->name('pemasukan');
    Route::post('/sum-pemasukan', [JadwalController::class, 'calculateTotalPrice'])->name('calculateTotalPrice');
    Route::post('/pemasukan', [JadwalController::class, 'store'])->name('pemasukan');
    Route::get('/tambah-pengeluaran', [JadwalController::class, 'insert'])->name('pengeluaran');
    // USERS
    Route::get('/users', [UsersController::class, 'index'])->name('index');
    Route::post('/add-users', [UsersController::class, 'store']);
    Route::put('/edit-users/{id}', [UsersController::class, 'updateStatus'])->name('users.update');
});

Route::group(['middleware' => ['auth', 'ceklevel:User,Admin,Super Admin']], function () {
    Route::post('/print/{id_pemesanan}', [JadwalController::class, 'kwitansi'])->name('print');
});

//reset password

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
