<?php

namespace App\Http\Controllers;

use App\Models\Barang_222291;
use App\Models\Kategori_222291;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class BarangController_222291 extends Controller
{
    // 1. Menampilkan daftar barang
    public function index(Request $request)
    {
        // Retrieve filter parameters from the request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Build query with potential filters
        $query = Barang_222291::with('kategori');

        if ($startDate) {
            $query->whereDate('tanggal_masuk_222291', '>=', $startDate);  // Filter by start date
        }

        if ($endDate) {
            $query->whereDate('tanggal_masuk_222291', '<=', $endDate);  // Filter by end date
        }

        // Get the filtered barang records
        $barang = $query->get();

        // Calculate total jumlah_222291
        $totalJumlah = Barang_222291::sum('jumlah_222291');

        // Return the view with filtered barang data
        return view('barang.index', compact('barang', 'totalJumlah'));
    }

    // 2. Menampilkan form tambah barang
    public function create()
    {
        $kategori = Kategori_222291::all();  // Fetch all categories
        return view('barang.add', compact('kategori'));  // Pass to view
    }

    // 3. Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang_222291'   => 'required|string|max:255',
            'kategori_id_222291'   => 'required',
            'jumlah_222291'        => 'required|integer',
            'lokasi_222291'        => 'required|string|max:255',
            'kondisi_222291'       => 'required|string|max:255',
            'tanggal_masuk_222291' => 'required|date',
            'foto'                 => 'required|image|mimes:jpeg,png,jpg|max:2048',  // Validasi file
        ]);

        // Simpan foto
        $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
        $path     = $request->file('foto')->move(public_path('images/barang'), $filename);  // Folder 'public/images/barang'

        // Simpan data barang
        Barang_222291::create([
            'nama_barang_222291'   => $request->nama_barang_222291,
            'kategori_id_222291'   => $request->kategori_id_222291,
            'jumlah_222291'        => $request->jumlah_222291,
            'lokasi_222291'        => $request->lokasi_222291,
            'kondisi_222291'       => $request->kondisi_222291,
            'tanggal_masuk_222291' => $request->tanggal_masuk_222291,
            'path_img_222291'      => 'images/barang/' . $filename,  // Path gambar
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    // 4. Menampilkan detail barang
    public function show($id)
    {
        $barang = Barang_222291::with('kategori')->findOrFail($id);  // Mengambil barang beserta kategori
        return view('barang.detail', compact('barang'));  // Mengembalikan view dengan data barang
    }

    // 5. Menampilkan form edit barang
    public function edit($id)
    {
        $barang   = Barang_222291::findOrFail($id);
        $kategori = Kategori_222291::all();  // Mengambil semua kategori
        return view('barang.update', compact('barang', 'kategori'));  // Mengirim barang dan kategoris ke view
    }

    // 6. Memperbarui data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang_222291'   => 'required|string|max:255',
            'kategori_id_222291'   => 'required|exists:kategori_222291,id_kategori_222291',
            'jumlah_222291'        => 'required|integer',
            'lokasi_222291'        => 'required|string|max:255',
            'kondisi_222291'       => 'required|string|max:255',
            'tanggal_masuk_222291' => 'required|date',
        ]);

        // Cari barang berdasarkan ID
        $barang = Barang_222291::findOrFail($id);
        // Update data barang dengan request yang diterima
        $barang->update($request->all());

        // Redirect ke halaman index barang dengan pesan sukses
        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    // 7. Menghapus barang
    public function destroy($id)
    {
        $barang = Barang_222291::findOrFail($id);
        $barang->delete();  // Menghapus barang

        return redirect()
            ->route('barang.index')  // Mengalihkan ke index barang
            ->with('success', 'Barang berhasil dihapus');
    }

    public function exportPdf()
    {
        $barangs = Barang_222291::with('kategori')->get();
        $pdf     = Pdf::loadView('barang.pdf', compact('barangs'));
        return $pdf->download('barang_222291.pdf');  // Unduh file PDF
    }
}
