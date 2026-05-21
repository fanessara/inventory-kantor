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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruangan_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('categories')->cascadeOnDelete();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('foto')->nullable();
            $table->string('jumlah');
            $table->enum('kondisi', ['baik', 'rusak'])->default('baik');
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
