<?php

namespace App\Http\Controllers;

use App\Models\Kategori_222291;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori_222291::all(); // Ambil semua kategori dari database
        return view('kategori.index', compact('kategori')); // Pastikan nama view sesuai
    }

    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_222291' => 'required|string|max:255',
        ]);

        Kategori_222291::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $kategori = Kategori_222291::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $kategori = Kategori_222291::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_222291' => 'required|string|max:255',
        ]);

        $kategori = Kategori_222291::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori_222291::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }


}
