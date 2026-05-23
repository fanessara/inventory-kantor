<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Role
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // 2. Buat Akun Admin Default (Pakai Username)
        $admin = User::create([
            'name'     => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'jabatan'  => 'Admin Sistem',
            'no_hp'    => '081234567890',
            'alamat'   => 'Ruang Server'
        ]);

        // 3. Role 'admin'
        $admin->assignRole('admin');
    }
}
