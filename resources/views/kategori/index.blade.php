@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Kelola Kategori Di Sini</strong>
            </span>
        </div>

        <x-kategori title="Kategori" 
              :createRoute="route('kategori.create')" 
              :editRoute="'kategori.edit'" 
              :deleteRoute="'kategori.destroy'" 
              :columns="[
                  ['label' => 'ID', 'field' => 'id_kategori_222291', 'type' => 'text'],
                  ['label' => 'Nama Kategori', 'field' => 'nama_kategori_222291', 'type' => 'text'],
              ]"
              :data="$kategori" />
    </div>
@endsection