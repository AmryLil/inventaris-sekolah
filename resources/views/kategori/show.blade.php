@extends('layouts.user_type.auth')
@section('content')
    <div class="container">
    <p>ini adalah daftar</p>
        <h1>Detail Kategori</h1>
        <p>ID: {{ $kategori->id }}</p>
        <p>Nama Kategori: {{ $kategori->nama_kategori_222291 }}</p>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection