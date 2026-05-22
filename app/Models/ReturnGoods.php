<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnGoods extends Model
{
    protected $table = 'return_goods';

    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian',
        'jumlah_kembali',
        'kondisi_barang',
        'status_pengembalian',
    ];

    /**
     * 
     * @var array<string, string>
     * 
     */

    protected $casts = [
        'tanggal_pengembalian' => 'date',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(BorrowingGoods::class);
    }
}
