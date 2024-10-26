<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('pengguna_222291')->insert([
            [
                'nama_pengguna_222291' => 'Admin',
                'email_pengguna_222291' => 'admin@sekolah.com',
                'password_pengguna_222291' => Hash::make('password'),
                'role_pengguna_222291' => 'admin'
            ],
            [
                'nama_pengguna_222291' => 'Staf',
                'email_pengguna_222291' => 'staf@sekolah.com',
                'password_pengguna_222291' => Hash::make('password'),
                'role_pengguna_222291' => 'staf'
            ],
        ]);
    }
}
