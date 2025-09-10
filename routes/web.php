<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify'=> false,
    'confirm'=> false
]);



Route::group([
    'middleware' => ['auth']

], function () { 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('/data-barang', App\Http\Controllers\DataBarangController::class)
    ->only('index', 'show');

    Route::resource('/aktivitas', App\Http\Controllers\AktivitasController::class);

    Route::resource('/admin', App\Http\Controllers\AdminController::class);

    Route::get('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('ubah-profil');
    Route::POST('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('ubah-profil.update');
});