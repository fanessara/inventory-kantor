<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingGoods extends Model
{
    protected $table =  'borrowing_goods';

    protected $fillable = [
        'barang_id',
        'peminjam_id',
        'jumlah_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ] ;

    /** 
     * 
     * @var array<string, string>
     */

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];

    public function barang()
    {
        return $this->belongsTo(Items::class);
    }

    public function peminjam()
    {
        return $this->belongsTo(Borrowers::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(ReturnGoods::class);
    }
}
