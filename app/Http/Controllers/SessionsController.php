<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // Menampilkan form login
    public function create()
    {
        return view('session.login-session');
    }

    // Proses login
    public function store()
    {
        // Validasi input
        $attributes = request()->validate([
            'email_222291'    => 'required|email',
            'password_222291' => 'required|min:8|max:10',
        ], [
            'email_222291.required'    => 'Email wajib diisi.',
            'email_222291.email'       => 'Email harus berupa alamat email yang valid.',
            'password_222291.required' => 'Password wajib diisi.',
            'password_222291.min'      => 'Password harus terdiri dari tepat 8 karakter.',
            'password_222291.max'      => 'Password harus terdiri dari tepat 8 karakter.',
        ]);

        // Coba login
        if (Auth::attempt([
            'email_222291' => $attributes['email_222291'],
            'password'     => $attributes['password_222291'],
        ])) {
            // Regenerasi session untuk keamanan
            session()->regenerate();

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Simpan role pengguna dalam session
            session(['role' => $user->role_222291]);  // Pastikan kolom role ada di model User

            // Redirect berdasarkan role
            return redirect($user->role === 'admin' ? 'barang' : 'barang')
                ->with(['success' => 'Anda berhasil login.']);
        }

        // Jika login gagal, kembali dengan error
        return back()->withErrors([
            'email_222291' => 'Email atau password tidak valid.',
        ]);
    }

    // Proses logout
    public function destroy()
    {
        Auth::logout();  // Logout pengguna
        session()->forget('role');  // Hapus role dari session saat logout
        return redirect('/login')->with(['success' => 'Anda telah logout.']);
    }
}
