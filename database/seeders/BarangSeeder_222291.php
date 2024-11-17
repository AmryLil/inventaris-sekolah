<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder_222291 extends Seeder
{
    public function run()
    {
        DB::table('barang_222291')->insert([
            [
                'nama_barang_222291'   => 'Laptop',
                'kategori_id_222291'   => 1,  // Elektronik
                'jumlah_222291'        => 10,
                'lokasi_222291'        => 'Lab Komputer',
                'kondisi_222291'       => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291'    => 'Digunakan untuk pembelajaran',
                'path_img_222291'      => 'images/barang/laptop.jpg',  // Path sesuai upload
            ],
            [
                'nama_barang_222291'   => 'Meja Belajar',
                'kategori_id_222291'   => 3,  // Furnitur
                'jumlah_222291'        => 20,
                'lokasi_222291'        => 'Ruang Kelas',
                'kondisi_222291'       => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291'    => 'Untuk kegiatan belajar mengajar',
                'path_img_222291'      => 'images/barang/meja_belajar.jpg',  // Path sesuai upload
            ],
            [
                'nama_barang_222291'   => 'Proyektor',
                'kategori_id_222291'   => 1,  // Elektronik
                'jumlah_222291'        => 5,
                'lokasi_222291'        => 'Aula',
                'kondisi_222291'       => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291'    => 'Digunakan untuk presentasi',
                'path_img_222291'      => 'images/barang/proyektor.jpg',  // Path sesuai upload
            ],
            [
                'nama_barang_222291'   => 'Kursi',
                'kategori_id_222291'   => 3,  // Furnitur
                'jumlah_222291'        => 50,
                'lokasi_222291'        => 'Ruang Kelas',
                'kondisi_222291'       => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291'    => 'Untuk kegiatan belajar mengajar',
                'path_img_222291'      => 'images/barang/kursi.jpg',  // Path sesuai upload
            ],
            [
                'nama_barang_222291'   => 'Whiteboard',
                'kategori_id_222291'   => 2,  // Alat Tulis
                'jumlah_222291'        => 5,
                'lokasi_222291'        => 'Ruang Kelas',
                'kondisi_222291'       => 'Baik',
                'tanggal_masuk_222291' => Carbon::now(),
                'keterangan_222291'    => 'Digunakan untuk menulis materi',
                'path_img_222291'      => 'images/barang/whiteboard.jpg',  // Path sesuai upload
            ],
        ]);
    }
}
