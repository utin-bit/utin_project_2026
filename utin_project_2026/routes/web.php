<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DocumentationFileController;
use App\Http\Controllers\FeedController;

// Rute untuk Halaman Home menggunakan Controller
Route::get('/', [HomeController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/documentation', [DocumentationFileController::class, 'index'])->name('documentation.index');
Route::post('/documentation', [DocumentationFileController::class, 'store'])->name('documentation.store');

Route::resource('campaign', CampaignController::class);
Route::resource('donation', DonationController::class);

Route::get('/documentations', fn () => redirect()->route('documentation.index'));
Route::get('/feeds', [FeedController::class, 'index']);