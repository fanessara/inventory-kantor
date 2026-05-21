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
        Schema::create('borrowing_goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('items')->cascadeOnDelete();
            $table->foreignId('peminjam_id')->constrained('borrowers')->cascadeOnDelete();
            $table->integer('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'selesai'])->default('dipinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing_goods');
    }
};
