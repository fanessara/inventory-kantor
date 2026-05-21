<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() 
    {
        $kategoris = Categories::with('kategori')->latest()->get();

        return view('pages.kategori.views', compact('kategoris'));
    }
}
