@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <h1>Edit Barang</h1>

        <!-- Tampilkan pesan sukses -->


        <!-- Form Edit Barang -->
        <form action="{{ route('barang.update', $barang->id_barang_222291) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_barang_222291">Nama Barang</label>
                <input type="text" class="form-control @error('nama_barang_222291') is-invalid @enderror"
                    name="nama_barang_222291" value="{{ old('nama_barang_222291', $barang->nama_barang_222291) }}" required>
                @error('nama_barang_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori_id_222291">Kategori</label>
                <select name="kategori_id_222291" class="form-control @error('kategori_id_222291') is-invalid @enderror"
                    required>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id_kategori_222291 }}"
                            {{ $barang->kategori_id_222291 == $kat->id_kategori_222291 ? 'selected' : '' }}>
                            {{ $kat->nama_kategori_222291 }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_222291">Jumlah</label>
                <input type="number" class="form-control @error('jumlah_222291') is-invalid @enderror" name="jumlah_222291"
                    value="{{ old('jumlah_222291', $barang->jumlah_222291) }}" required>
                @error('jumlah_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lokasi_222291">Lokasi</label>
                <input type="text" class="form-control @error('lokasi_222291') is-invalid @enderror" name="lokasi_222291"
                    value="{{ old('lokasi_222291', $barang->lokasi_222291) }}" required>
                @error('lokasi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kondisi_222291">Kondisi</label>
                <input type="text" class="form-control @error('kondisi_222291') is-invalid @enderror"
                    name="kondisi_222291" value="{{ old('kondisi_222291', $barang->kondisi_222291) }}" required>
                @error('kondisi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_masuk_222291">Tanggal Masuk</label>
                <input type="date" class="form-control @error('tanggal_masuk_222291') is-invalid @enderror"
                    name="tanggal_masuk_222291" value="{{ old('tanggal_masuk_222291', $barang->tanggal_masuk_222291) }}"
                    required>
                @error('tanggal_masuk_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Barang</button>
        </form>
    </div>
@endsection
