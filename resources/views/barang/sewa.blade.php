@extends('layouts.user_type.auth')
@section('content')
    <div class="container mt-5">
        <h2>Formulir Peminjaman Inventaris</h2>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="barang_id_222291" class="form-label">Barang</label>
                <select name="barang_id_222291" class="form-select" required>

                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_peminjaman_222291" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman_222291" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengembalian_222291" class="form-label">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian_222291" class="form-control">
            </div>
            <div class="mb-3">
                <label for="status_peminjaman_222291" class="form-label">Status Peminjaman</label>
                <input type="text" name="status_peminjaman_222291" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
        </form>
    </div>
@endsection
