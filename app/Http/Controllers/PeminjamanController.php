<?php

namespace App\Http\Controllers;

use App\Models\Barang_222291;
use App\Models\Peminjaman_222291;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman_222291::with('barang')->get();
        $barangList = Barang_222291::all();  // Ambil semua data barang
        return view('barang.index', compact('peminjaman', 'barangList'));
    }

    public function showSewaForm($id)
    {
        $barang = Barang_222291::findOrFail($id);  // Ambil data barang berdasarkan ID
        return view('barang.sewa', compact('barang'));  // Tampilkan data barang di form sewa
    }

    public function showList()
    {
        $peminjaman = Peminjaman_222291::with('barang')->get();
        $barangList = Barang_222291::all();  // Ambil semua data barang
        return view('peminjaman.index', compact('peminjaman', 'barangList'));  // Tampilkan data barang di form sewa
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'barang_id_222291'            => 'required|exists:barang_222291,id_barang_222291',
            'nama_peminjam_222291'        => 'required|string',
            'tanggal_peminjaman_222291'   => 'required|date',
            'tanggal_pengembalian_222291' => 'nullable|date|after_or_equal:tanggal_peminjaman_222291',
            'status_peminjaman_222291'    => 'required|string',
            'quantity'                    => 'required|integer|min:1',  // Validasi jumlah
        ]);

        // Ambil barang berdasarkan ID
        $barang = Barang_222291::findOrFail($request->barang_id_222291);

        // Cek apakah stok barang mencukupi
        if ($barang->jumlah_222291 < $request->quantity) {  // Pastikan menggunakan jumlah_222291
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        // Buat entri baru di tabel peminjaman
        Peminjaman_222291::create([
            'barang_id_222291'            => $request->barang_id_222291,
            'nama_peminjam_222291'        => $request->nama_peminjam_222291,
            'tanggal_peminjaman_222291'   => $request->tanggal_peminjaman_222291,
            'jumlah_222291'               => $request->quantity,
            'tanggal_pengembalian_222291' => $request->tanggal_pengembalian_222291,
            'status_peminjaman_222291'    => $request->status_peminjaman_222291,
        ]);

        // Kurangi jumlah barang di tabel barang
        $barang->decrement('jumlah_222291', $request->quantity);  // Pastikan menggunakan jumlah_222291

        return redirect()->route('barang.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data peminjaman berdasarkan ID
        $peminjaman = Peminjaman_222291::findOrFail($id);
        $barangList = Barang_222291::all();  // Ambil semua data barang untuk dropdown

        return view('peminjaman.edit', compact('peminjaman', 'barangList'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'barang_id_222291'            => 'required|exists:barang_222291,id_barang_222291',
            'nama_peminjam_222291'        => 'required|string',
            'tanggal_peminjaman_222291'   => 'required|date',
            'tanggal_pengembalian_222291' => 'nullable|date|after_or_equal:tanggal_peminjaman_222291',
            'status_peminjaman_222291'    => 'required|string',
            'quantity'                    => 'required|integer|min:1',
        ]);

        $peminjaman = Peminjaman_222291::findOrFail($id);
        $barang     = Barang_222291::findOrFail($request->barang_id_222291);

        // Cek perubahan jumlah barang
        $originalQuantity = $peminjaman->quantity;
        if ($request->quantity > $originalQuantity && ($barang->jumlah_222291 < ($request->quantity - $originalQuantity))) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        // Update stok barang
        $barang->decrement('jumlah_222291', $request->quantity - $originalQuantity);

        // Update data peminjaman
        $peminjaman->update([
            'barang_id_222291'            => $request->barang_id_222291,
            'nama_peminjam_222291'        => $request->nama_peminjam_222291,
            'tanggal_peminjaman_222291'   => $request->tanggal_peminjaman_222291,
            'tanggal_pengembalian_222291' => $request->tanggal_pengembalian_222291,
            'status_peminjaman_222291'    => $request->status_peminjaman_222291,
        ]);

        return redirect()->route('peminjaman.showList')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    // Method lainnya...

    public function destroy($id)
    {
        $peminjaman = Peminjaman_222291::findOrFail($id);

        // Kembalikan stok barang ketika peminjaman dihapus
        $barang = Barang_222291::findOrFail($peminjaman->barang_id_222291);
        $barang->increment('jumlah_222291', $peminjaman->jumlah_222291);

        $peminjaman->delete();

        return redirect()->route('peminjaman.showList')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function userPeminjaman()
    {
        // Ambil nama pengguna yang sedang login
        $namaPengguna = auth()->user()->name_222291;

        // Dapatkan semua peminjaman berdasarkan nama pengguna
        $peminjaman = Peminjaman_222291::with('barang')
            ->where('nama_peminjam_222291', $namaPengguna)
            ->get();

        return view('peminjaman.userpeminjaman', compact('peminjaman'));
    }
}
