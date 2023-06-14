<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\HomeController;
use App\http\Controllers\Landing\MobilController;
use App\Http\Controllers\Landing\DetailMobilController;
use App\Http\Controllers\Landing\TransaksiController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\KendaraanController;
use App\Http\Controllers\Dashboard\PemesananController;
use App\http\Controllers\Dashboard\JadwalController;
use Illuminate\Support\Facades\Mail;


require __DIR__.'/auth.php';


Route::group(['middleware' => ['auth','ceklevel:User']], function(){
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::put('/upload-transaksi/{id_pemesanan}', [TransaksiController::class, 'update'])->name('upload-transaksi');
});


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/daftar-kendaraan', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/daftar-mobil', [DetailMobilController::class, 'index'])->name('detail-mobil.index');
Route::get('/search',[HomeController::class, 'search'])->name('home.search');
Route::get('/daftar-kendaraan/search', [MobilController::class, 'search'])->name('mobil.search');

Route::post('/booking', [MobilController::class, 'store']);
Route::get('/{id}', [HomeController::class, 'show']);


Route::group(['middleware' => ['auth','ceklevel:Admin,Super Admin,Sopir']], function(){

    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // KENDARAAN
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('Kendaraan');
    Route::get('/tambah-kendaraan', [KendaraanController::class, 'insert']);
    Route::post('/add-kendaraan', [KendaraanController::class, 'store']);
    Route::get('/update-kendaraan{id_mobil}', [KendaraanController::class, 'updateView'])->name('update.view');
    Route::put('/edit-kendaraan/{id_mobil}', [KendaraanController::class,'update'])->name('kendaraan.update');
    Route::delete('/hapus/{id_mobil}', [KendaraanController::class, 'hapus'])->name('kendaraan.hapus');

 // JADWAL
     Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

    // PEMESANAN
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('order');
    Route::get('/tambah-pemesanan', [PemesananController::class, 'insert']);
    Route::post('/add-pemesanan', [PemesananController::class, 'store']);
    Route::put('/approve/{id_pemesanan}', [PemesananController::class, 'approve'])->name('upprove');
    Route::put('/edit-sopir/{id}', [PemesananController::class, 'updateSopir']);
   
    
    Route::get('/pemasukan', [JadwalController::class, 'pemasukan'])->name('pemasukan');
    Route::get('/pemasukan', [JadwalController::class, 'index'])->name('pemasukan');
    

});



Route::group(['middleware' => ['auth','ceklevel:Super Admin']], function(){
    // USERS
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/add-users', [UsersController::class, 'store']);
    // Route::delete('/hapus/{id}', [UsersController::class, 'hapus'])->name('user.hapus');

});

Route::group(['middleware' => ['auth','ceklevel:User,Admin,Super Admin']], function(){
    Route::post('/print/{id_pemesanan}',[JadwalController::class,'kwitansi'])->name('print');
});

//reset password
Route::get('/send-email',function(){
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];
   
    Mail::to('alisadikinsyahrizal@gmail.com')->send(new SendEmail($data));
   
    dd("Email Berhasil dikirim.");
});














