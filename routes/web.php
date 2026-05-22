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
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
// End Rute Barang

// Rute Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
// Create Rute Kategori
Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
// Edit Rute Kategori
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
// Hapus Rute Kategori
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
// End Rute Kategori