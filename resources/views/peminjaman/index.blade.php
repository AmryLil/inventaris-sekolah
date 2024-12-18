@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Kelola Semua Peminjaman Di Sini</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a>
            </span>
        </div>
        {{-- <form method="GET" action="{{ route('peminjaman.showList') }}">
            <div class="row g-3 mx-4">
                <div class="col-md-5">
                    <label for="start_date" class="form-label">Tanggal Awal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ request('start_date') }}">
                </div>
                <div class="col-md-5">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-control"
                        value="{{ request('end_date') }}">
                </div>
                <div style="margin-top: 45px" class="col-md-2 d-flex align-items-center justify-content-center ">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form> --}}


        <x-tablepinjam title="Peminjaman" :editRoute="'peminjaman.edit'" :loanRoute="'peminjaman.sewa'" :deleteRoute="'peminjaman.destroy'" :editRoute :columns="[
            ['label' => 'Nama Pengguna', 'field' => 'nama_peminjam_222291', 'type' => 'text'],
            ['label' => 'Nama Barang', 'field' => 'barang.nama_barang_222291', 'type' => 'text'], // Ambil nama barang
            ['label' => 'Tanggal Sewa', 'field' => 'tanggal_peminjaman_222291', 'type' => 'text'],
            ['label' => 'Tanggal Kembali', 'field' => 'tanggal_pengembalian_222291', 'type' => 'text'],
            ['label' => 'Jumlah Barang', 'field' => 'jumlah_222291', 'type' => 'number'],
            ['label' => 'Status', 'field' => 'status_peminjaman_222291', 'type' => 'text'],
        ]"
            :data="$peminjaman" />

        {{-- <div class="mb-3 mx-4">
            <a href="{{ route('peminjaman.generatePDF') }}" class="btn btn-primary">Export PDF</a>
        </div> --}}



    </div>
@endsection
