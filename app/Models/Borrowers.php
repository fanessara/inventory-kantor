<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowers extends Model
{
    protected $table = 'borrowers' ;

    protected $fillable = [
        'nama',
        'jabatan',
        'no_hp',
        'alamat',
    ];

    public function peminjaman()
    {
        return $this->hasMany('BorrowingGoods::class');
    }
}
