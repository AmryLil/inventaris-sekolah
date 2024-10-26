<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            KategoriSeeder_222291::class,
            BarangSeeder_222291::class,
            PenggunaSeeder_222291::class,
            PeminjamanSeeder_222291::class,
            RiwayatBarangSeeder_222291::class,
            LokasiSeeder_222291::class,
        ]);
    }
}
