<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use SweetAlert2\Laravel\Swal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeminjamController extends Controller
{
    public function index()
    {
        // Gunakan role
        $peminjams = User::role('user')->latest()->paginate(10);

        return view('admin.pages.peminjam.views', compact('peminjams'));
    }

    public function create()
    {
        return view('admin.pages.peminjam.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username'    => 'required|string|unique:users,username',
            'password' => 'required|min:6',
            'jabatan'  => 'required|string|max:255',
            'no_hp'    => 'required|numeric',
            'alamat'   => 'required|string',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username'    => $request->username,
            'password' => Hash::make($request->password),
            'jabatan'  => $request->jabatan,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
        ]);

        $user->assignRole('user');

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
        $peminjam = User::findOrFail($id);
        return view('admin.pages.peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, $id)
    {
        $peminjam = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'username'    => 'required|username|unique:users,username,' . $peminjam->id,
            'password' => 'nullable|min:6',
            'jabatan'  => 'required|string|max:255',
            'no_hp'    => 'required|numeric',
            'alamat'   => 'required|string',
        ]);

        $data = [
            'name'    => $request->name,
            'username'   => $request->username,
            'jabatan' => $request->jabatan,
            'no_hp'   => $request->no_hp,
            'alamat'  => $request->alamat,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $peminjam->update($data);

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
        $peminjam = User::findOrFail($id);
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
