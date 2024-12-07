@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Laporan Peminjaman</strong>
                <!-- Optional link to external resource can be added here -->
            </span>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('peminjaman.showListLaporan') }}">
            <div class="row g-3 mx-4">
                <!-- Tanggal Awal -->
                <div class="col-md-5">
                    <label for="start_date" class="form-label">Tanggal Awal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ old('start_date') }}">
                </div>

                <!-- Tanggal Akhir -->
                <div class="col-md-5">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                </div>

                <!-- Tombol Filter -->
                <div style="margin-top: 45px" class="col-md-2 d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>


        <!-- Table displaying data -->
        <x-tablepinjam title="Peminjaman" :editRoute="'peminjaman.edit'" :loanRoute="'peminjaman.sewa'" :deleteRoute="'peminjaman.destroy'" :columns="[
            ['label' => 'Nama Pengguna', 'field' => 'nama_peminjam_222291', 'type' => 'text'],
            ['label' => 'Nama Barang', 'field' => 'barang.nama_barang_222291', 'type' => 'text'],
            ['label' => 'Tanggal Sewa', 'field' => 'tanggal_peminjaman_222291', 'type' => 'text'],
            ['label' => 'Tanggal Kembali', 'field' => 'tanggal_pengembalian_222291', 'type' => 'text'],
            ['label' => 'Jumlah Barang', 'field' => 'jumlah_222291', 'type' => 'number'],
            ['label' => 'Status', 'field' => 'status_peminjaman_222291', 'type' => 'text'],
        ]"
            :data="$peminjaman" />

        <!-- PDF Export Button -->
        <div class="mb-3 mx-4">
            <!-- Tombol Ekspor PDF -->
            <button class="btn btn-primary" id="exportPdfBtn">Export PDF</button>
        </div>
    </div>


    <script>
        document.getElementById('exportPdfBtn').addEventListener('click', function() {
            // Ambil parameter dari URL (query string)
            const urlParams = new URLSearchParams(window.location.search);
            const startDate = urlParams.get('start_date');
            const endDate = urlParams.get('end_date');

            // Bangun URL untuk ekspor PDF
            let url = "{{ route('peminjaman.generatePDF') }}";

            // Tambahkan query string jika ada nilai tanggal
            if (startDate) {
                url += `?start_date=${startDate}`;
            }
            if (endDate) {
                // Jika sudah ada query string sebelumnya, tambahkan & sebagai pemisah
                url += `&end_date=${endDate}`;
            }

            // Redirect ke URL dengan query string
            window.location.href = url;
        });
    </script>
@endsection
