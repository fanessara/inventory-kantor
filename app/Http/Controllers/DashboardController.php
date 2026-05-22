<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $stokMenipis = Barang::where('stok', '<=', 5)->count();

        $barangRusak = Barang::where('kondisi', 'Rusak')->count();

        $barangBaik = Barang::where('kondisi', 'Baik')->count();

        $barangRusakChart = Barang::where('kondisi', 'Rusak')->count();

        $barangPerbaikan = Barang::where('kondisi', 'Perbaikan')->count();

        $barangTerbaru = Barang::latest()->take(5)->get();

        return view('dashboard', compact(

            'totalBarang',
            'stokMenipis',
            'barangRusak',
            'barangTerbaru',

            'barangBaik',
            'barangRusakChart',
            'barangPerbaikan'

        ));
    }
}
