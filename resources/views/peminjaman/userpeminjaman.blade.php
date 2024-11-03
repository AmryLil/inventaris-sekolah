@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>List Barang yang Anda Pinjam</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a>
            </span>
        </div>

        <x-table title="Peminjaman" :createRoute="route('peminjaman.create')" :editRoute="'peminjaman.edit'" :loanRoute="'peminjaman.create'" :deleteRoute="'peminjaman.destroy'" :columns="[
            ['label' => 'Nama Barang', 'field' => 'barang.nama_barang_222291', 'type' => 'text'], // Mengambil nama barang dari relasi
            ['label' => 'Nama Peminjam', 'field' => 'nama_peminjam_222291', 'type' => 'text'],
            ['label' => 'Jumlah Barang', 'field' => 'jumlah_222291', 'type' => 'number'],
            ['label' => 'Tanggal Peminjaman', 'field' => 'tanggal_peminjaman_222291', 'type' => 'text'],
            ['label' => 'Tanggal Pengembalian', 'field' => 'tanggal_pengembalian_222291', 'type' => 'text'],
            ['label' => 'Status', 'field' => 'status_peminjaman_222291', 'type' => 'text'],
        ]"
            :data="$peminjaman" />

    </div>
@endsection
