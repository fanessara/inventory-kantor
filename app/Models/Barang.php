<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'ruangan',
        'stok',
        'kondiisi',
        'deskripsi',
        'gambar',

    ];
    
    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
}
}


