<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

class AuthController extends Controller
{
    // Dashboard Logic Redirect Login Admin dan User
    public function showLoginForm()
    {
        if(Auth::check()) {
            if(Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
        return view('auth.login');
    }

    // Logic Proses Validasi Admin dan User
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            
            $request->session()->regenerate();

            Swal::fire([
                'title' => 'Login Berhasil!',
                'text'  => 'Selamat datang, ' . Auth::user()->name,
                'toast' => true,
                'position' => 'top-end',
                'icon' => 'success',
                'showConfirmButton' => false,
                'timer' => 3000,
                'timerProgressBar' => true,
            ]);

            // ARAH DASHBOARD BERDASARKAN ROLE
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard'); // URL ke halaman admin
            } else {
                return redirect()->route('user.dashboard');  // URL ke halaman user
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session dan bikin ulang token CSRF demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kasih notif alert pas berhasil logout
        Swal::fire([
            'title' => 'Logout Berhasil!',
            'text'  => 'Anda telah keluar dari sistem.',
            'toast' => true,
            'position' => 'top-end',
            'icon' => 'success',
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('login');
    }
}
