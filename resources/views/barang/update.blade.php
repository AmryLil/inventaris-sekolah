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
                <select name="lokasi_222291" class="form-control @error('lokasi_222291') is-invalid @enderror" required>
                    <option value="">Pilih Lokasi</option>
                    <option value="Kantor" {{ old('lokasi_222291', $barang->lokasi_222291) == 'Kantor' ? 'selected' : '' }}>
                        Kantor</option>
                    <option value="Kelas" {{ old('lokasi_222291', $barang->lokasi_222291) == 'Kelas' ? 'selected' : '' }}>
                        Kelas
                    </option>
                    <option value="Lab" {{ old('lokasi_222291', $barang->lokasi_222291) == 'Lab' ? 'selected' : '' }}>
                        Lab
                    </option>
                    <!-- Tambahkan lokasi lainnya sesuai kebutuhan -->
                </select>
                @error('lokasi_222291')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kondisi_222291">Kondisi</label>
                <select name="kondisi_222291" class="form-control @error('kondisi_222291') is-invalid @enderror" required>
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik"
                        {{ old('kondisi_222291', $barang->kondisi_222291) == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak"
                        {{ old('kondisi_222291', $barang->kondisi_222291) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="Perlu Perawatan"
                        {{ old('kondisi_222291', $barang->kondisi_222291) == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu
                        Perawatan</option>
                    <!-- Tambahkan kondisi lainnya sesuai kebutuhan -->
                </select>
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
