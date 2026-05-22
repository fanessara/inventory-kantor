<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [

        'barang_id',
        'nama_peminjam',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'

    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}