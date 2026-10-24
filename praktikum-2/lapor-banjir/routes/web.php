<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('laporan.form');
});

// Halaman form pelaporan
Route::get('/lapor', [LaporanController::class, 'create'])->name('laporan.form');

// Halaman konfirmasi (form dikirim via POST)
Route::post('/konfirmasi', [LaporanController::class, 'konfirmasi'])->name('laporan.konfirmasi');

// Jika /konfirmasi dibuka langsung lewat URL (GET), arahkan kembali ke form
Route::get('/konfirmasi', function () {
    return redirect()->route('laporan.form');
});

// Halaman daftar laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
