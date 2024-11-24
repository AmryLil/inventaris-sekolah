@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Kelola Semua Barang Di Sini</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a>
            </span>
        </div>

        <x-table title="Barang" :createRoute="route('barang.create')" :editRoute="'barang.edit'" :loanRoute="'barang.sewa'" :deleteRoute="'barang.destroy'" :columns="[
            ['label' => 'Photo', 'field' => 'path_img_222291', 'type' => 'image'],
            ['label' => 'Nama Barang', 'field' => 'nama_barang_222291', 'type' => 'text'],
            ['label' => 'Kategori', 'field' => 'kategori.nama_kategori_222291', 'type' => 'text'], // Ambil nama kategori
            ['label' => 'Jumlah', 'field' => 'jumlah_222291', 'type' => 'text'],
            ['label' => 'Kondisi', 'field' => 'kondisi_222291', 'type' => 'text'],
            ['label' => 'Tanggal Masuk', 'field' => 'tanggal_masuk_222291', 'type' => 'text'],
        ]"
            :data="$barang" />
        <div class=" font-semibold " style="padding-left: 30px">
            <h6>Total Barang : {{ $totalJumlah }}</h6>
        </div>
        <a href="{{ route('barang.export-pdf') }}" class="btn btn-primary mb-3 mx-4">Export PDF</a>
    </div>
@endsection
