<?php

use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataMasterControllers;
use App\Http\Controllers\PerhitunganControllers;

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::get('/', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [dashboard::class,'index'])->name('dashboard');
//     Route::get('/barang', [BarangController::class,'index'])->name('barang');

// });

Route::get('/dashboard', [dashboard::class,'index'])->name('dashboard');
Route::get('/barang', [BarangController::class,'index'])->name('barang');


Route::get('/data-wisatawan', [PerhitunganControllers::class,'perhitungan']);

Route::get('/master-data', [DataMasterControllers::class,'index']);
Route::get('/master-data-aksi', [DataMasterControllers::class,'create']);
Route::get('/tambah', [DataMasterControllers::class,'tambah']);

Route::delete('/master-data/delete', [DataMasterControllers::class,'delete']);

Route::post('/master-data/store', [DataMasterControllers::class,'store']);
