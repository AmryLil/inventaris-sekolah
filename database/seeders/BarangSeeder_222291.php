<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('barang_222291')->insert([
            [
                'nama_barang_222291' => 'Laptop',
                'kategori_id_222291' => 1,
                'jumlah_222291' => 10,
                'lokasi_222291' => 'Lab Komputer',
                'kondisi_222291' => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291' => 'Digunakan untuk pembelajaran'
            ],
            [
                'nama_barang_222291' => 'Meja Belajar',
                'kategori_id_222291' => 3,
                'jumlah_222291' => 20,
                'lokasi_222291' => 'Ruang Kelas',
                'kondisi_222291' => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291' => 'Untuk kegiatan belajar mengajar'
            ],
        ]);
    }
}
