<?php

use App\Http\Controllers\Landing\RegisterController;
use App\Http\Controllers\LoginController;

//Login dan Register
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
