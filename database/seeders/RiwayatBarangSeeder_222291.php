<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RiwayatBarangSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('riwayat_barang_222291')->insert([
            [
                'barang_id_222291' => 1,
                'tanggal_riwayat_222291' => Carbon::now()->subDays(15),
                'jenis_perubahan_222291' => 'penambahan',
                'jumlah_perubahan_222291' => 5,
                'keterangan_riwayat_222291' => 'Penambahan laptop baru'
            ],
            [
                'barang_id_222291' => 2,
                'tanggal_riwayat_222291' => Carbon::now()->subDays(20),
                'jenis_perubahan_222291' => 'perbaikan',
                'jumlah_perubahan_222291' => 1,
                'keterangan_riwayat_222291' => 'Perbaikan meja'
            ],
        ]);
    }
}
