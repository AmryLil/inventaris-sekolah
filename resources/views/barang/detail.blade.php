@extends('layouts.user_type.auth') {{-- Menggunakan layout utama --}}

@section('content')
    <div class="container py-2">
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Detail Barang</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a>
            </span>
        </div>

        <div class="card shadow-sm border-0 mx-4">
            <div class="row g-0">
                {{-- Gambar barang --}}
                <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                    <img src="{{ asset($barang->path_img_222291) }}" alt="{{ $barang->nama_barang_222291 }}"
                        class="img-fluid rounded-start p-3" style="max-height: 300px; object-fit: cover;">
                </div>


                {{-- Informasi barang --}}
                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="card-title mb-3 text-dark">{{ $barang->nama_barang_222291 }}</h2>

                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <strong>Kategori:</strong>
                                <span class="text-secondary">{{ $barang->kategori->nama_kategori_222291 }}</span>
                            </li>
                            <li class="mb-2">
                                <strong>Jumlah:</strong>
                                <span class="text-secondary">{{ $barang->jumlah_222291 }}</span>
                            </li>
                            <li class="mb-2">
                                <strong>Lokasi:</strong>
                                <span class="text-secondary">{{ $barang->lokasi_222291 }}</span>
                            </li>
                            <li class="mb-2">
                                <strong>Kondisi:</strong>
                                <span class="text-secondary">{{ $barang->kondisi_222291 }}</span>
                            </li>
                            <li class="mb-2">
                                <strong>Tanggal Masuk:</strong>
                                <span class="text-secondary">{{ $barang->tanggal_masuk_222291 }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('barang.index') }}" class="btn btn-primary mt-4">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Barang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
