<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL BARANG
        $totalBarang = Barang::count();

        // TOTAL STOK
        $totalStok = Barang::sum('stok');

        // BARANG RUSAK
        $barangRusak = Barang::where('kondisi', 'Rusak')->count();

        // STOK MENIPIS
        $stokMenipis = Barang::where('stok', '<=', 5)->count();

        // TOTAL PEMINJAMAN
        $totalPeminjaman = Peminjaman::count();

        // BARANG TERBARU
        $barangTerbaru = Barang::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBarang',
            'totalStok',
            'barangRusak',
            'stokMenipis',
            'totalPeminjaman',
            'barangTerbaru'
        ));
    }
}