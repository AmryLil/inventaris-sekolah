@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-5">
        <h2>Formulir Peminjaman Inventaris</h2>
        <form action="{{ route('barang.sewa.store', ['id' => $barang->id_barang_222291]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" value="{{ $barang->nama_barang_222291 }}" disabled>
                <input type="hidden" name="barang_id_222291" value="{{ $barang->id_barang_222291 }}">
            </div>

            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Pengguna</label>
                <input name="nama_peminjam_222291" type="text" id="nama_user" class="form-control"
                    value="{{ auth()->user()->name_222291 }}" readonly>
            </div>

            <div class="mb-3">
                <label for="tanggal_peminjaman_222291" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman_222291" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pengembalian_222291" class="form-label">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian_222291" class="form-control">
            </div>
            <input type="hidden" name="status_peminjaman_222291" value="Dipinjam">

            {{-- <div class="mb-3">
                <label for="status_peminjaman_222291" class="form-label">Status Peminjaman</label>
                <select name="status_peminjaman_222291" class="form-control" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Dikembalikan">Dikembalikan</option>
                    <option value="Terlambat">Terlambat</option>
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
        </form>
    </div>
@endsection
