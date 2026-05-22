<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use SweetAlert2\Laravel\Swal;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    
public function index()
    {
        $ruangans = Rooms::latest()->paginate(10);
        return view('pages.ruangan.views', compact('ruangans'));
    }

    public function create()
    {
        return view('pages.ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_ruangan' => 'required|unique:rooms,kode_ruangan',
            'nama_ruangan' => 'required',
        ]);

        Rooms::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);

        Swal::fire([
            'title' => 'Ruangan berhasil ditambahkan!',
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

        return redirect()->route('ruangan.index');
    }

    public function edit($id)
    {
        $ruangan = Rooms::findOrFail($id);
        return view('pages.ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        $ruangan = Rooms::findOrFail($id);

        $request->validate([
            'kode_ruangan' => 'required|unique:rooms,kode_ruangan,' . $ruangan->id,
            'nama_ruangan' => 'required'
        ]);

        $ruangan->update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);

        Swal::fire([
            'title' => 'Ruangan berhasil diperbarui!',
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

        return redirect()->route('ruangan.index');
    }

    public function destroy($id)
    {
        $ruangan = Rooms::findOrFail($id);
        $ruangan->delete();

        Swal::fire([
            'title' => 'Ruangan berhasil dihapus!',
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

        return redirect()->route('ruangan.index');
    }}
