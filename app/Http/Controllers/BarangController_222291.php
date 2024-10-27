<?php

namespace App\Http\Controllers;

use App\Models\Barang_222291;
use App\Models\Kategori_222291;
use Illuminate\Http\Request;

class BarangController_222291 extends Controller
{
    // 1. Menampilkan daftar barang
    public function index()
    {
        $barang = Barang_222291::with('kategori')->get(); // Load barang with categories
        return view('barang.index', compact('barang')); // Pass to view
    }

    // 2. Menampilkan form tambah barang
    public function create()
    {
        $kategori = Kategori_222291::all(); // Fetch all categories
        return view('barang.add', compact('kategori')); // Pass to view
    }

    // 3. Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang_222291' => 'required|string|max:255',
            'kategori_id_222291' => 'required', 
            'jumlah_222291' => 'required|integer',
            'lokasi_222291' => 'required|string|max:255',
            'kondisi_222291' => 'required|string|max:255',
            'tanggal_masuk_222291' => 'required|date',
        ]);

        Barang_222291::create($request->all()); // Menyimpan barang baru

        return redirect()->route('barang.index') // Mengalihkan ke index barang
                         ->with('success', 'Barang berhasil ditambahkan');
    }

    // 4. Menampilkan detail barang
    public function show($id)
    {
        $barang = Barang_222291::with('kategori')->findOrFail($id); // Mengambil barang beserta kategori
        return view('barang.show', compact('barang')); // Mengembalikan view dengan data barang
    }

    // 5. Menampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang_222291::findOrFail($id);
        $kategori = Kategori_222291::all(); // Mengambil semua kategori
        return view('barang.update', compact('barang', 'kategori')); // Mengirim barang dan kategoris ke view
    }

    // 6. Memperbarui data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang_222291' => 'required|string|max:255',
            'kategori_id_222291' => 'required|exists:kategori_222291,id_kategori_222291',
            'jumlah_222291' => 'required|integer',
            'lokasi_222291' => 'required|string|max:255',
            'kondisi_222291' => 'required|string|max:255',
            'tanggal_masuk_222291' => 'required|date',
        ]);

        // Cari barang berdasarkan ID
        $barang = Barang_222291::findOrFail($id);
        // Update data barang dengan request yang diterima
        $barang->update($request->all());

        // Redirect ke halaman index barang dengan pesan sukses
        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui');
    }

    // 7. Menghapus barang
    public function destroy($id)
    {
        $barang = Barang_222291::findOrFail($id);
        $barang->delete(); // Menghapus barang

        return redirect()->route('barang.index') // Mengalihkan ke index barang
                         ->with('success', 'Barang berhasil dihapus');
    }
}
