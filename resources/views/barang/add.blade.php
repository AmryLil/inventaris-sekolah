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

            {{-- Lokasi Dropdown --}}
            <div class="form-group mb-3">
                <label for="lokasi_222291">Lokasi</label>
                <select name="lokasi_222291" class="form-control @error('lokasi_222291') is-invalid @enderror" required>
                    <option value="">Pilih Lokasi</option>
                    <option value="Kantor" {{ old('lokasi_222291') == 'Kantor' ? 'selected' : '' }}>Kantor</option>
                    <option value="Kelas" {{ old('lokasi_222291') == 'Kelas' ? 'selected' : '' }}>Kelas</option>
                    <option value="Lab" {{ old('lokasi_222291') == 'Lab' ? 'selected' : '' }}>Lab</option>
                </select>
                @error('lokasi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kondisi Dropdown --}}
            <div class="form-group mb-3">
                <label for="kondisi_222291">Kondisi</label>
                <select name="kondisi_222291" class="form-control @error('kondisi_222291') is-invalid @enderror" required>
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik" {{ old('kondisi_222291') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak" {{ old('kondisi_222291') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="Butuh Perbaikan" {{ old('kondisi_222291') == 'Butuh Perbaikan' ? 'selected' : '' }}>
                        Butuh Perbaikan</option>
                </select>
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
