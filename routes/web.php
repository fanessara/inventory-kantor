<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiwayatController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/dashboard');

});

/*
|--------------------------------------------------------------------------
| ROUTE YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | EDIT PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/edit-profile', [UserController::class, 'editProfile'])
        ->name('edit.profile');

    Route::post('/update-profile', [UserController::class, 'updateProfile'])
        ->name('update.profile');

    /*
    |--------------------------------------------------------------------------
    | CRUD BARANG
    |--------------------------------------------------------------------------
    */

    Route::resource('barang', BarangController::class);

    Route::get('/barang-pdf', [BarangController::class, 'exportPdf']);

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::resource('user', UserController::class)
        ->middleware('admin');

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT
    |--------------------------------------------------------------------------
    */

    Route::get('/riwayat', [RiwayatController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | PROFILE DEFAULT LARAVEL
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    Route::resource('peminjaman', PeminjamanController::class);

});

/*
|--------------------------------------------------------------------------
| TEST ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {

    return 'Laravel Aman';

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';