<?php

use App\Http\Controllers\LaporBanjirController;
use Illuminate\Support\Facades\Route;

// Ganti route '/' bawaan (welcome) agar langsung menuju form pelaporan.
Route::redirect('/', '/lapor-banjir');

// (1) Halaman form pelaporan
Route::get('/lapor-banjir', [LaporBanjirController::class, 'form'])
    ->name('laporbanjir.form');

// (2) Menerima kiriman form (POST) dan (3) menampilkan halaman konfirmasi
Route::post('/lapor-banjir', [LaporBanjirController::class, 'kirim'])
    ->name('laporbanjir.kirim');
