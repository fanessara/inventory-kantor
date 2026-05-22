<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Borrowers;
use SweetAlert2\Laravel\Swal;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjams = Borrowers::latest()->paginate(10);

        return view('pages.peminjam.views', compact('peminjams'));
    }

    public function create()
    {
        return view('pages.peminjam.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp'   => 'required|numeric',
            'alamat'  => 'required|string',
        ]);

        Borrowers::create([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'no_hp'   => $request->no_hp,
            'alamat'  => $request->alamat,
        ]);

        // Alert Berhasil
        Swal::fire([
            'title' => 'Peminjam berhasil ditambahkan',
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
        return redirect()->route('peminjam.index');
    }

    public function edit($id)
    {
        $peminjam = Borrowers::findOrFail($id);
        return view('pages.peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, $id)
    {
        $peminjam = Borrowers::findOrFail($id);

        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp'   => 'required|numeric',
            'alamat'  => 'required|string',
        ]);

        $peminjam->update([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_hp'   => 'required|numeric',
            'alamat'  => 'required|string',
        ]);

        Swal::fire([
            'title' => 'Data Peminjam berhasil diperbarui',
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

        return redirect()->route('peminjam.index');
    }

    public function destroy($id)
    {
        $peminjam = Borrowers::findOrFail($id);
        $peminjam->delete();

        Swal::fire([
            'title' => 'Data Peminjam berhasil dihapus',
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

        redirect()->route('peminjam.index');
    }
}
