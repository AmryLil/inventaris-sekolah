<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('kategori_222291')->insert([
            ['nama_kategori_222291' => 'Elektronik'],
            ['nama_kategori_222291' => 'Alat Tulis'],
            ['nama_kategori_222291' => 'Furnitur'],
            ['nama_kategori_222291' => 'Olahraga'],
        ]);
    }
}
