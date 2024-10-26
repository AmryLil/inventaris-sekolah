<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('peminjaman_222291')->insert([
            [
                'barang_id_222291' => 1,
                'pengguna_id_222291' => 2,
                'tanggal_peminjaman_222291' => Carbon::now()->subDays(5),
                'tanggal_pengembalian_222291' => null,
                'status_peminjaman_222291' => 'dipinjam'
            ],
            [
                'barang_id_222291' => 2,
                'pengguna_id_222291' => 2,
                'tanggal_peminjaman_222291' => Carbon::now()->subDays(10),
                'tanggal_pengembalian_222291' => Carbon::now()->subDays(2),
                'status_peminjaman_222291' => 'dikembalikan'
            ],
        ]);
    }
}
