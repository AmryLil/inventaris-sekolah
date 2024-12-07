@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-5">
        <h2>Formulir Peminjaman Inventaris</h2>

        {{-- Pesan Error --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('barang.sewa.store', ['id' => $barang->id_barang_222291]) }}" method="POST">
            @csrf

            {{-- Nama Barang --}}
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" value="{{ $barang->nama_barang_222291 }}"
                    disabled>
                <input type="hidden" name="barang_id_222291" value="{{ $barang->id_barang_222291 }}">
            </div>

            {{-- Nama Pengguna --}}
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Pengguna</label>
                <input name="nama_peminjam_222291" type="text" id="nama_user" class="form-control"
                    value="{{ auth()->user()->name_222291 }}" readonly>
            </div>

            {{-- Tanggal Peminjaman --}}
            <div class="mb-3">
                <label for="tanggal_peminjaman_222291" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman_222291" class="form-control"
                    value="{{ old('tanggal_peminjaman_222291', \Carbon\Carbon::now()->toDateString()) }}" required
                    id="tanggal_peminjaman">
            </div>

            {{-- Tanggal Pengembalian --}}
            <div class="mb-3">
                <label for="tanggal_pengembalian_222291" class="form-label">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian_222291" class="form-control" id="tanggal_pengembalian"
                    value="{{ old('tanggal_pengembalian_222291', \Carbon\Carbon::now()->addDays(7)->toDateString()) }}"
                    required>
            </div>

            {{-- Jumlah Peminjaman --}}
            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Peminjaman</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                    value="{{ old('quantity') }}" placeholder="Masukkan jumlah yang ingin dipinjam" required>
            </div>

            <input type="hidden" name="status_peminjaman_222291" value="Dipinjam">

            {{-- Tombol Submit --}}
            <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
        </form>
    </div>

    <script>
        // Set tanggal pengembalian to 7 days after peminjaman when peminjaman date is selected
        document.getElementById('tanggal_peminjaman').addEventListener('change', function() {
            var tanggalPeminjaman = new Date(this.value);
            tanggalPeminjaman.setDate(tanggalPeminjaman.getDate() + 7); // Tambahkan 7 hari

            // Format the date to YYYY-MM-DD for the input field
            var tahun = tanggalPeminjaman.getFullYear();
            var bulan = ("0" + (tanggalPeminjaman.getMonth() + 1)).slice(-2); // Tambahkan leading zero pada bulan
            var hari = ("0" + tanggalPeminjaman.getDate()).slice(-2); // Tambahkan leading zero pada hari

            // Set the tanggal pengembalian field with the new date
            var tanggalPengembalian = document.getElementById('tanggal_pengembalian');
            tanggalPengembalian.value = tahun + '-' + bulan + '-' + hari;
        });
    </script>
@endsection
