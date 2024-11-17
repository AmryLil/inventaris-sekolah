@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Barang</h1>

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nama_barang_222291">Nama Barang</label>
                <input type="text" class="form-control @error('nama_barang_222291') is-invalid @enderror"
                    name="nama_barang_222291" value="{{ old('nama_barang_222291') }}" required>
                @error('nama_barang_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kategori_id_222291">Kategori</label>
                <select name="kategori_id_222291" class="form-control @error('kategori_id_222291') is-invalid @enderror"
                    required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id_kategori_222291 }}"
                            {{ old('kategori_id_222291') == $kat->id_kategori_222291 ? 'selected' : '' }}>
                            {{ $kat->nama_kategori_222291 }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_222291">Jumlah</label>
                <input type="number" class="form-control @error('jumlah_222291') is-invalid @enderror" name="jumlah_222291"
                    value="{{ old('jumlah_222291') }}" required>
                @error('jumlah_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="lokasi_222291">Lokasi</label>
                <input type="text" class="form-control @error('lokasi_222291') is-invalid @enderror" name="lokasi_222291"
                    value="{{ old('lokasi_222291') }}" required>
                @error('lokasi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kondisi_222291">Kondisi</label>
                <input type="text" class="form-control @error('kondisi_222291') is-invalid @enderror"
                    name="kondisi_222291" value="{{ old('kondisi_222291') }}" required>
                @error('kondisi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_masuk_222291">Tanggal Masuk</label>
                <input type="date" class="form-control @error('tanggal_masuk_222291') is-invalid @enderror"
                    name="tanggal_masuk_222291" value="{{ old('tanggal_masuk_222291') }}" required>
                @error('tanggal_masuk_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="foto">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" required>
                @error('foto')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
    </div>
@endsection
