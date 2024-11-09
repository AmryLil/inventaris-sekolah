<!-- resources/views/users/show.blade.php -->
@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-5">
        <h1>Detail User</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone_222291 }}</li>
            <li class="list-group-item"><strong>Location:</strong> {{ $user->location_222291 }}</li>
            <li class="list-group-item"><strong>About Me:</strong> {{ $user->about_me_222291 }}</li>
        </ul>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
