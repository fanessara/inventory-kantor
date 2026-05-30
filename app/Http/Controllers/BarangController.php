<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('barang.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $gambar = null;

        // CEK ADA GAMBAR
        if($request->hasFile('gambar')){

            // NAMA FILE
            $gambar = time().'.'.$request->gambar->extension();

            // UPLOAD FILE
            $request->gambar->move(public_path('gambar_barang'), $gambar);

        }

        Barang::create([

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
            ->with('success', 'Barang berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        $barang = Barang::with('peminjaman')
                        ->findOrFail($id);

        return view('barang.show', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        if(auth()->user()->role != 'admin'){

        abort(403);

    }

    $barang = Barang::findOrFail($id);

    return view('barang.edit', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {

     if(auth()->user()->role != 'admin'){

        abort(403);

    }

    $barang = Barang::findOrFail($id);

    $gambar = $barang->gambar;
        $barang = Barang::findOrFail($id);

        $gambar = $barang->gambar;

        // CEK ADA GAMBAR BARU
        if($request->hasFile('gambar')){

            // HAPUS GAMBAR LAMA
            if($barang->gambar &&
               file_exists(public_path('gambar_barang/' . $barang->gambar))){

                unlink(public_path('gambar_barang/' . $barang->gambar));

            }

            // UPLOAD GAMBAR BARU
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

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */


    
    public function destroy($id)
    {

    if(auth()->user()->role != 'admin'){

    abort(403);

}
        $barang = Barang::findOrFail($id);

        // HAPUS GAMBAR
        if($barang->gambar &&
           file_exists(public_path('gambar_barang/' . $barang->gambar))){

            unlink(public_path('gambar_barang/' . $barang->gambar));

        }

        $barang->delete();

        return redirect('/barang')
            ->with('success', 'Barang berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT PDF
    |--------------------------------------------------------------------------
    */

    public function exportPdf()
    {
        $barangs = Barang::all();

        $pdf = Pdf::loadView('barang.pdf', compact('barangs'));

        return $pdf->download('laporan-barang.pdf');
    }
}