<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/Kontak', [KontakController::class, 'index']);
Route::get('/Profil', [ProfilController::class, 'index']);