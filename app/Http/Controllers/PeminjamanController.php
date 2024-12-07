<?php

namespace App\Http\Controllers;

use App\Models\Barang_222291;
use App\Models\Peminjaman_222291;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
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

    public function showList(Request $request)
    {
        // Retrieve the date range filters from the request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Query the peminjaman with optional date filters
        $peminjaman = Peminjaman_222291::with('barang')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('tanggal_peminjaman_222291', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('tanggal_peminjaman_222291', '<=', $endDate);
            })
            ->get();

        // Get all barang (items)
        $barangList = Barang_222291::all();

        // Return the view with filtered data
        return view('peminjaman.index', compact('peminjaman', 'barangList'));
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

    public function generatePDF(Request $request)
    {
        // Ambil filter tanggal dari request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Query data peminjaman dengan filter tanggal
        $peminjaman = Peminjaman_222291::with('barang')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('tanggal_peminjaman_222291', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('tanggal_peminjaman_222291', '<=', $endDate);
            })
            ->get();

        // Render view ke PDF
        $pdf = PDF::loadView('peminjaman.pdf', [
            'peminjaman' => $peminjaman,
            'startDate'  => $startDate,
            'endDate'    => $endDate,
        ]);

        // Unduh file PDF
        return $pdf->download('laporan_peminjaman.pdf');
    }

    public function returnLoan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal_pengembalian_222291' => 'required|date',
        ]);

        // Ambil data peminjaman
        $peminjaman = Peminjaman_222291::findOrFail($id);

        // Ambil data barang terkait
        $barang = Barang_222291::findOrFail($peminjaman->barang_id_222291);

        // Hitung denda jika ada
        $tanggalPengembalian = Carbon::parse($request->tanggal_pengembalian_222291);
        $tanggalBatas        = Carbon::parse($peminjaman->tanggal_pengembalian_222291);
        $denda               = 0;

        if ($tanggalPengembalian->greaterThan($tanggalBatas)) {
            $hariTerlambat = $tanggalPengembalian->diffInDays($tanggalBatas);
            $denda         = $hariTerlambat * 20000;  // Denda Rp20.000 per hari
        }

        // Update status peminjaman
        $peminjaman->update([
            'tanggal_pengembalian_222291' => $request->tanggal_pengembalian_222291,
            'status_peminjaman_222291'    => 'Dikembalikan',
        ]);

        // Kembalikan stok barang
        $barang->increment('jumlah_222291', $peminjaman->jumlah_222291);

        // Redirect dengan informasi denda
        return redirect()->route('user.peminjaman')->with('success', 'Peminjaman berhasil dikembalikan. Total denda: Rp' . number_format($denda, 0, ',', '.'));
    }

    public function showListLaporan(Request $request)
    {
        // Retrieve the date range filters from the request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Query the peminjaman with optional date filters
        $peminjaman = Peminjaman_222291::with('barang')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('tanggal_peminjaman_222291', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('tanggal_peminjaman_222291', '<=', $endDate);
            })
            ->get();

        // Get all barang (items)
        $barangList = Barang_222291::all();

        // Return the view with filtered data
        return view('peminjaman.laporan', compact('peminjaman', 'barangList'));
    }
}
