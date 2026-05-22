<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use SweetAlert2\Laravel\Swal;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() 
    {
        $kategoris = Categories::latest()->paginate(10);

        return view('pages.kategori.views', compact('kategoris'));
    }

    // Logic buat kategori
    public function create()
    {
        return view('pages.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:categories,nama_kategori'
        ], [
            'nama_kategori' => 'Nama kategori sudah ada.'
        ]);

        Categories::create([
            'nama_kategori' => $request->nama_kategori
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

        return redirect()->route('kategori.index');
    }

    // Logic edit Kategori
    public function edit($id)
    {
        $kategori = Categories::findOrFail($id);
        return view('pages.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Categories::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|unique:categories,nama_kategori,' . $kategori->id
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

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diedit');
    }

    // Logic hapus Kategori
    public function destroy($id)
    {
        $kategori = Categories::findOrFail($id);
        $kategori->delete();

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
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
