<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name_222291'     => ['required', 'max:50'],
            'email_222291'    => ['required', 'email', 'max:50', Rule::unique('users_222291', 'email_222291')],
            'password_222291' => ['required', 'min:5', 'max:20'],
            'agreement'       => ['accepted'],
        ]);

        // Set role default ke 'user'
        $attributes['role_222291'] = 'user';

        // Enkripsi password
        $attributes['password_222291'] = bcrypt($attributes['password_222291']);

        $user = User::create($attributes);

        // Login otomatis setelah registrasi
        if (Auth::attempt([
            'email_222291' => $attributes['email_222291'],
            'password'     => request('password_222291'),
        ])) {
            // Regenerasi session untuk keamanan
            session()->regenerate();

            // Simpan role pengguna dalam session
            session(['role' => $user->role_222291]);

            // Redirect berdasarkan role
            return redirect($user->role_222291 === 'admin' ? '/admin/barang' : '/user/barang')
                ->with(['success' => 'Your account has been created and you are now logged in.']);
        }

        // Flash message dan redirect ke dashboard
        session()->flash('success', 'Your account has been created. Please login.');
        return redirect('/login');
    }
}
