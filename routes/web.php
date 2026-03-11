<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AccountController;

// Auth
Route::get('/', fn() => redirect()->route('login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Account (semua role bisa akses)
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::patch('/account/profil', [AccountController::class, 'updateProfil'])->name('account.profil');
    Route::patch('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});

// Warga
Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/dashboard', [WargaController::class, 'index'])->name('warga.dashboard');
    Route::get('/buat-laporan', [WargaController::class, 'create'])->name('warga.buat');
    Route::post('/buat-laporan', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/tentang', [WargaController::class, 'tentang'])->name('warga.tentang');
    Route::get('/laporan/{id}', [WargaController::class, 'show'])->name('warga.show');
    Route::get('/laporan/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/laporan/{id}', [WargaController::class, 'update'])->name('warga.update');
});

// Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::get('/petugas/analisis', [PetugasController::class, 'analisis'])->name('petugas.analisis');
    Route::get('/petugas/laporan/{id}', [PetugasController::class, 'show'])->name('petugas.show');
    Route::patch('/petugas/laporan/{id}/status', [PetugasController::class, 'updateStatus'])->name('petugas.updateStatus');
});