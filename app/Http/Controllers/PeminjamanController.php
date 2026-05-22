<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view('peminjaman.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $barang = Barang::findOrFail($request->barang_id);

    // VALIDASI STOK
    if($request->jumlah > $barang->stok){

        return back()->with('error', 'Stok tidak mencukupi');

    }

    // SIMPAN PEMINJAMAN
    Peminjaman::create([

        'barang_id' => $request->barang_id,
        'nama_peminjam' => $request->nama_peminjam,
        'jumlah' => $request->jumlah,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'status' => 'Dipinjam'

    ]);

    // KURANGI STOK
    $barang->stok -= $request->jumlah;

    $barang->save();

    return redirect('/peminjaman')
           ->with('success', 'Peminjaman berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
