@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Kelola Semua Data Guru Di Sini</strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white"></a>
            </span>
        </div>

        <x-tableusers :createRoute="route('users.create')" title="Guru" :editRoute="'users.edit'" :loanRoute="'users.create'" :deleteRoute="'users.destroy'" :editRoute
            :columns="[
                ['label' => 'Nama Pengguna', 'field' => 'name_222291', 'type' => 'text'],
                ['label' => 'Email', 'field' => 'email_222291', 'type' => 'text'], // Ambil nama barang
                ['label' => 'Password', 'field' => 'password_222291', 'type' => 'text'],
                ['label' => 'Telepon', 'field' => 'phone_222291', 'type' => 'text'],
                ['label' => 'Alamat', 'field' => 'location_222291', 'type' => 'text'],
            ]" :data="$users" />
    </div>
@endsection
