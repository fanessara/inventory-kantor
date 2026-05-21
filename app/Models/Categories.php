<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nama_kategori'];

    public function barang()
    {
        return $this->hasMany(Items::class);
    }
}
