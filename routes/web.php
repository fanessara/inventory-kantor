<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Pages\BarangController;
use App\Http\Controllers\Admin\Pages\KategoriController;
use App\Http\Controllers\Admin\Pages\RuanganController;
use App\Http\Controllers\Admin\Pages\PeminjamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function ()
{
    if(Auth::check()) {
        if(Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
        return redirect()->route('login');
});


// Start Admin Route Groups

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    // Start Rute Barang
    Route::get('/admin/barang', [BarangController::class, 'index'])->name('barang.index');
    // Create Rute Barang
    Route::get('/admin/barang/tambah', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/admin/barang', [BarangController::class, 'store'])->name('barang.store');
    // Edit Rute Barang
    Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    // Hapus Rute Barang
    Route::delete('/admin/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    // End Rute Barang
    
    // Start Rute Kategori
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    // Create Rute Kategori
    Route::get('/admin/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    // Edit Rute Kategori
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    // Hapus Rute Kategori
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    // End Rute Kategori
    
    // Start Rute Ruangan
    Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    // Create
    Route::get('/admin/ruangan/tambah', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
    // Edit
    Route::get('/admin/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::put('/admin/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
    // Hapus
    Route::delete('/admin/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
    // End Rute Ruangan

    // Start Rute Peminjam
    Route::get('/admin/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
    // Create
    Route::get('/admin/peminjam/tambah', [PeminjamController::class, 'create'])->name('peminjam.create');
    Route::post('/admin/peminjam', [PeminjamController::class, 'store'])->name('peminjam.store');
    // Edit
    Route::get('/admin/peminjam/{id}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
    Route::put('/admin/peminjam/{id}', [PeminjamController::class, 'update'])->name('peminjam.update');
    // Hapus
    Route::delete('/admin/peminjam/{id}', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');
    // End Rute Peminjam

});    
// End Admin Route Groups

Route::middleware(['auth', 'role:user'])->group(function()
{
    Route::get('dashboard', [DashboardController::class, 'userIndex'])->name('user.dashboard');
});
