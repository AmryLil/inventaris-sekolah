<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('lokasi_222291')->insert([
            ['nama_lokasi_222291' => 'Lab Komputer', 'keterangan_lokasi_222291' => 'Lab komputer utama'],
            ['nama_lokasi_222291' => 'Ruang Kelas', 'keterangan_lokasi_222291' => 'Ruang kelas untuk siswa'],
        ]);
    }
}
