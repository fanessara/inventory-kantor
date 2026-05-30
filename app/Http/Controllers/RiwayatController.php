<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Peminjaman::latest()->get();

        return view('riwayat.index', compact('riwayats'));
    }
}