<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index(Request $request)
{
    $query = Barang::query();

    // SEARCH NAMA BARANG
    if($request->search){

        $query->where('nama_barang', 'like', '%' . $request->search . '%');

    }

    // FILTER KATEGORI
    if($request->kategori){

        $query->where('kategori', $request->kategori);

    }

    // FILTER KONDISI
    if($request->kondisi){

        $query->where('kondisi', $request->kondisi);

    }

    $barangs = $query->latest()->get();

    return view('barang.index', compact('barangs'));
}

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'ruangan' => $request->ruangan,
            'stok'=> $request->stok,
            'kondisi'=> $request->kondisi,
            'deskripsi'=> $request->deskripsi,
        ]);

        return redirect('/barang')
        ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
{
    $barang = Barang::findOrFail($id);

    return view('barang.edit', compact('barang'));
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);

    $gambar = $barang->gambar;

    if($request->hasFile('gambar')){

        
        if($barang->gambar && file_exists(public_path('gambar_barang/' . $barang->gambar))){

            unlink(public_path('gambar_barang/' . $barang->gambar));

        }

        // upload gambar baru
        $gambar = time().'.'.$request->gambar->extension();

        $request->gambar->move(public_path('gambar_barang'), $gambar);

    }

    $barang->update([

        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'ruangan' => $request->ruangan,
        'stok' => $request->stok,
        'kondisi' => $request->kondisi,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar,

    ]);

    return redirect('/barang')
        ->with('success', 'Barang berhasil diupdate');
}

public function destroy($id)
{
    $barang = Barang::findOrFail($id);

    $barang->delete();

    return redirect('/barang')
        ->with('success', 'Barang berhasil dihapus');
}

public function show(string $id)
{
    $barang = Barang::with('peminjaman')
                    ->findOrFail($id);

    return view('barang.show', compact('barang'));
}

public function exportPdf()
{
    $barangs = Barang::all();

    $pdf = Pdf::loadView('barang.pdf', compact('barangs'));

    return $pdf->download('laporan-barang.pdf');
}
}


