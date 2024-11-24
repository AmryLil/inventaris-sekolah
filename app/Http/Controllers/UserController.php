<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the users_management.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data user dengan role 'user'
        $users = User::where('role_222291', 'user')->get();

        // Tampilkan ke view
        return view('users_management.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users_management.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users_222291,email_222291',
            'password' => 'required|string|min:6|confirmed',
            'role'     => ['required', Rule::in(['admin', 'user'])],
            'telepon'  => 'nullable|string|max:20',  // Sesuaikan jika ada input telepon
            'alamat'   => 'nullable|string|max:255',
        ]);

        // Simpan data user baru
        User::create([
            'name_222291'     => $validated['name'],
            'email_222291'    => $validated['email'],
            'password_222291' => Hash::make($validated['password']),
            'role_222291'     => $validated['role'],
            'phone_222291'    => $validated['telepon'],
            'location_222291' => $validated['alamat'],
            'about_me_222291' => $request->input('about_me'),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users_management.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users_management.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users_222291', 'email_222291')->ignore($id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'role' => ['required', Rule::in(['admin', 'user'])],
            'telepon' => 'nullable|string|max:20',  // Sesuaikan jika ada input telepon
            'alamat' => 'nullable|string|max:255',
        ]);

        // Siapkan data yang akan diupdate
        $dataToUpdate = [
            'name_222291'     => $validated['name'],
            'email_222291'    => $validated['email'],
            'role_222291'     => $validated['role'],
            'phone_222291'    => $validated['telepon'],
            'location_222291' => $validated['alamat'],
            'about_me_222291' => $request->input('about_me'),
        ];

        // Hanya update password jika ada input password baru
        if (!empty($validated['password'])) {
            $dataToUpdate['password_222291'] = Hash::make($validated['password']);
        }

        // Update data user
        $user->update($dataToUpdate);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = User::findOrFail($id);
        $kategori->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function exportPDF()
    {
        $users = User::where('role_222291', 'user')->get();  // Ambil semua data pengguna
        $pdf   = PDF::loadView('users_management.pdf', compact('users'));  // Load view PDF
        return $pdf->download('data_guru.pdf');  // Download file PDF
    }
}
