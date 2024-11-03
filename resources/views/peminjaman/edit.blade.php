@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-5">
        <h2>Edit Formulir Peminjaman Inventaris</h2>
        <form action="{{ route('peminjaman.update', ['id' => $peminjaman->id_peminjaman_222291]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control"
                    value="{{ $peminjaman->barang->nama_barang_222291 }}" disabled>
                <input type="hidden" name="barang_id_222291" value="{{ $peminjaman->barang_id_222291 }}">
            </div>

            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Pengguna</label>
                <input name="nama_peminjam_222291" type="text" id="nama_user" class="form-control"
                    value="{{ $peminjaman->nama_peminjam_222291 }}">
            </div>

            <div class="mb-3">
                <label for="tanggal_peminjaman_222291" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman_222291" class="form-control"
                    value="{{ $peminjaman->tanggal_peminjaman_222291 }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pengembalian_222291" class="form-label">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian_222291" class="form-control"
                    value="{{ $peminjaman->tanggal_pengembalian_222291 }}">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Peminjaman</label>
                <input type="number" name="quantity" id="quantity" class="form-control"
                    value="{{ $peminjaman->jumlah_222291 }}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="status_peminjaman_222291" class="form-label">Status Peminjaman</label>
                <select name="status_peminjaman_222291" class="form-control" required>
                    <option value="Dipinjam" {{ $peminjaman->status_peminjaman_222291 == 'Dipinjam' ? 'selected' : '' }}>
                        Dipinjam</option>
                    <option value="Dikembalikan"
                        {{ $peminjaman->status_peminjaman_222291 == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan
                    </option>
                    <option value="Terlambat" {{ $peminjaman->status_peminjaman_222291 == 'Terlambat' ? 'selected' : '' }}>
                        Terlambat</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Peminjaman</button>
        </form>
    </div>
@endsection
