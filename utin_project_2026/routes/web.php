<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;

// Rute untuk Halaman Home menggunakan Controller
Route::get('/', [HomeController::class, 'index']);

// Rute untuk Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
});

// Rute untuk Halaman Profil
Route::get('/profil', function () {
    return view('profil');
});