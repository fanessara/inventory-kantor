<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\BarangController;
use App\Http\Controllers\Pages\KategoriController;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

// Start Rute Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
// Create Rute Barang
Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
// Edit Rute Barang
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
// Hapus Rute Barang


// Rute Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');