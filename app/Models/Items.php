<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'ruangan_id',
        'kategori_id',
        'kode_barang',
        'nama_barang',
        'foto',
        'jumlah',
        'kondisi',
        'status',
    ];

    public function ruangan() {
        return $this->belongsTo(Rooms::class);
        
    }

    public function kategori() {

        return $this->belongsTo(Categories::class);

    }
    public function peminjaman() {

        return $this->hasMany(BorrowingGoods::class);

    }
}
