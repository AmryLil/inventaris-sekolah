<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // Ambil semua data user
        $users = User::all();
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
        ]);

        // Simpan data user baru
        User::create([
            'name_222291'     => $validated['name'],
            'email_222291'    => $validated['email'],
            'password_222291' => Hash::make($validated['password']),
            'role_222291'     => $validated['role'],
            'phone_222291'    => $request->input('phone'),
            'location_222291' => $request->input('location'),
            'about_me_222291' => $request->input('about_me'),
        ]);

        return redirect()->route('users')->with('success', 'User created successfully.');
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
    public function edit(User $user)
    {
        return view('users_management.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users_222291', 'email_222291')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        // Update data user
        $user->update([
            'name_222291'     => $validated['name'],
            'email_222291'    => $validated['email'],
            'role_222291'     => $validated['role'],
            'phone_222291'    => $request->input('phone'),
            'location_222291' => $request->input('location'),
            'about_me_222291' => $request->input('about_me'),
            'password_222291' => $validated['password'] ? Hash::make($validated['password']) : $user->password_222291,
        ]);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }
}
