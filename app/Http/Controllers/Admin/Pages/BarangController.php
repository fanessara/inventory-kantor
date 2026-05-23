<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Categories;
use App\Models\Rooms;
use Illuminate\Support\Facades\Storage;
use SweetAlert2\Laravel\Swal;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Items::with(['kategori:id,nama_kategori', 'ruangan:id,nama_ruangan'])
                    ->latest()
                    ->paginate(10);

        return view('admin.pages.dataBarang.views', compact('barangs'));
    }

    // Logic create Barang
    public function create()
    {
        $kategoris = Categories::select('id', 'nama_kategori')->get();
        $ruangans = Rooms::select('id', 'nama_ruangan')->get();

        return view('admin.pages.dataBarang.create', compact('kategoris', 'ruangans'));
    }
    public function store(Request $request)
    {
        // Validasi input data masuk

        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'ruangan_id'  => 'required',
            'jumlah'      => 'required|integer|min:1',
            'kondisi'     => 'required|in:baik,rusak',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'kode_barang.unique' => 'Kode barang sudah digunakan, silakan buat yang lain.',
            'foto.max' => 'Ukuran foto maksimal 2MB.'
        ]);

        // Validasi Foto yang diinput ke db
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_barang', 'barang');
        }

        // Memasukkan ke dalam db dari request client
        Items::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'ruangan_id'  => $request->ruangan_id,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'status'      => 'tersedia',
            'foto'        => $fotoPath,
        ]);

        // Alert Berhasil
        Swal::fire([
            'title' => 'Kategori berhasil ditambahkan',
            'toast' => true,
            'position' => 'top-end',
            'icon' => 'success',
            'background' => '#10b981',
            'color' => 'white',
            'iconColor' => 'white',
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
            'didOpen' => '(toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }',
        ]);

        return redirect()->route('barang.index');
    }


    // Logic edit Barang
    public function edit($id)
    {
        $barang = Items::findOrFail($id);
        $kategoris = Categories::select('id', 'nama_kategori')->get();
        $ruangans = Rooms::select('id', 'nama_ruangan')->get();

        return view('admin.pages.dataBarang.edit', compact('barang', 'kategoris', 'ruangans'));
    }
    public function update(Request $request, $id)
    {
        $barang = Items::findOrFail($id);
        $kategoris = Categories::select('id', 'nama_kategori')->get();
        $ruangans = Rooms::select('id', 'nama_ruangan')->get();

        $barang = Items::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'ruangan_id'  => 'required',
            'jumlah'      => 'required|integer|min:1',
            'kondisi'     => 'required|in:baik,rusak',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $barang->foto; // Default pakai foto lama

        // Cek kalau user upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage kalau ada
            if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
                Storage::disk('public')->delete($barang->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('foto_barang', 'public');
        }

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'ruangan_id'  => $request->ruangan_id,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'foto'        => $fotoPath,
            'deskripsi'   => $request->deskripsi,
        ]);

        // Alert Berhasil
        Swal::fire([
            'title' => 'Kategori berhasil diperbarui',
            'toast' => true,
            'position' => 'top-end',
            'icon' => 'success',
            'background' => '#10b981',
            'color' => 'white',
            'iconColor' => 'white',
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
            'didOpen' => '(toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }',
        ]);

        return redirect()->route('barang.index');
    }

    //  Logic Hapus Barang
    public function destroy($id)
    {
        $barang = Items::findOrFail($id);

        if ($barang->foto && Storage::disk('public')->exists($barang->foto))
            {
                Storage::disk('public')->delete($barang->foto);
            }
        
            // Alert Berhasil
        Swal::fire([
            'title' => 'Kategori berhasil dihapus',
            'toast' => true,
            'position' => 'top-end',
            'icon' => 'success',
            'background' => '#10b981',
            'color' => 'white',
            'iconColor' => 'white',
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
            'didOpen' => '(toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }',
        ]);

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }
}
