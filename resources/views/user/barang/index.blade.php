@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Kelola Semua Barang Disini</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a></strong>

            </span>
        </div>

        <x-table title="Barang" :columns="[
            ['label' => 'ID', 'field' => 'id_barang_222291', 'type' => 'text'],
            ['label' => 'Nama Barang', 'field' => 'nama_barang_222291', 'type' => 'text'],
            ['label' => 'Kategori', 'field' => 'kategori.nama_kategori_222291', 'type' => 'text'], // Ambil nama kategori
            ['label' => 'Jumlah', 'field' => 'jumlah_222291', 'type' => 'text'],
            ['label' => 'Kondisi', 'field' => 'kondisi_222291', 'type' => 'text'],
            ['label' => 'Tanggal Masuk', 'field' => 'tanggal_masuk_222291', 'type' => 'text'],
        ]" :data="$barang" />
    </div>
@endsection
