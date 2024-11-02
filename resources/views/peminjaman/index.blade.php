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

        <x-tablepinjam title="Peminjaman" :editRoute="'peminjaman.edit'" :loanRoute="'peminjaman.sewa'" :deleteRoute="'peminjaman.destroy'" :editRoute :columns="[
            ['label' => 'ID', 'field' => 'id_peminjaman_222291', 'type' => 'text'],
            ['label' => 'Nama Pengguna', 'field' => 'nama_peminjam_222291', 'type' => 'text'],
            ['label' => 'Nama Barang', 'field' => 'barang.nama_barang_222291', 'type' => 'text'], // Ambil nama barang
            ['label' => 'Tanggal Sewa', 'field' => 'tanggal_peminjaman_222291', 'type' => 'text'],
            ['label' => 'Tanggal Kembali', 'field' => 'tanggal_pengembalian_222291', 'type' => 'text'],
            ['label' => 'Status', 'field' => 'status_peminjaman_222291', 'type' => 'text'],
        ]"
            :data="$peminjaman" />
    </div>
@endsection
