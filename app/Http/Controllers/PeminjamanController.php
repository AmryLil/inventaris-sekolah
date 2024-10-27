<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman_222291;
use App\Models\Barang_222291;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman_222291::with('barang')->get();
        return view('barang.sewa', compact('peminjaman'));
    }

    public function create()
    {
        $barangList = Barang_222291::all();
        return view('barang.sewa', compact('barangList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id_222291' => 'required|exists:barang_222291,id_barang_222291',
            'tanggal_peminjaman_222291' => 'required|date',
            'status_peminjaman_222291' => 'required|string',
        ]);

        Peminjaman_222291::create([
            'barang_id_222291' => $request->barang_id_222291,
            'tanggal_peminjaman_222291' => $request->tanggal_peminjaman_222291,
            'tanggal_pengembalian_222291' => $request->tanggal_pengembalian_222291,
            'status_peminjaman_222291' => $request->status_peminjaman_222291,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman_222291::findOrFail($id);
        $barangList = Barang_222291::all();
        return view('peminjaman.edit', compact('peminjaman', 'barangList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id_222291' => 'required|exists:barang_222291,id_barang_222291',
            'tanggal_peminjaman_222291' => 'required|date',
            'status_peminjaman_222291' => 'required|string',
        ]);

        $peminjaman = Peminjaman_222291::findOrFail($id);
        $peminjaman->update([
            'barang_id_222291' => $request->barang_id_222291,
            'tanggal_peminjaman_222291' => $request->tanggal_peminjaman_222291,
            'tanggal_pengembalian_222291' => $request->tanggal_pengembalian_222291,
            'status_peminjaman_222291' => $request->status_peminjaman_222291,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman_222291::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
