<?php

namespace App\Http\Controllers;

use App\Models\Kategori_222291;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori_222291::with('barangs')->get(); // Mengambil semua kategori dengan barang terkait
        return view('barang.add', compact('kategori')); // Mengembalikan view dengan data kategori
    }

}
