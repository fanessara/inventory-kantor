<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // =========================
    // TAMPILKAN DATA USER
    // =========================
    public function index()
    {
        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }

    // =========================
    // HALAMAN EDIT PROFILE
    // =========================
    public function editProfile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    // =========================
    // UPDATE PROFILE
    // =========================
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $data = [

            'name'  => $request->name,
            'email' => $request->email,

        ];

        // JIKA PASSWORD DIISI
        if($request->password){

            $data['password'] = Hash::make($request->password);

        }

        $user->update($data);

        return redirect()->back()
            ->with('success', 'Profile berhasil diupdate');
    }
}