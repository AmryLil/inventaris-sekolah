@extends('layouts.user_type.auth')
@section('content')
    <div class="container">
        <h1>Tambah Kategori</h1>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kategori_222291">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori_222291" name="nama_kategori_222291" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>
@endsection