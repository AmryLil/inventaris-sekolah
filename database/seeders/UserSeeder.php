<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_222291')->insert([
            [
                'name_222291' => 'admin123',
                'email_222291' => 'admin@gmail.com',
                'password_222291' => Hash::make('secret'),
                'role_222291' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_222291' => 'azwina',
                'email_222291' => 'wina@gmail.com',
                'password_222291' => Hash::make('wina1234'),
                'role_222291' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
}
