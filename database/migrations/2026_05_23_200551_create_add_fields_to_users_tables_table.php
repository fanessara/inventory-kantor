<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom email bawaan Laravel
            
            // Tambah kolom username
            $table->string('username')->unique()->after('name');
            // biodata peminjam
            $table->string('jabatan')->nullable()->after('password');
            $table->string('no_hp')->nullable()->after('jabatan');
            $table->text('alamat')->nullable()->after('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['jabatan', 'no_hp', 'alamat']);
           
            
        });
    }
};
