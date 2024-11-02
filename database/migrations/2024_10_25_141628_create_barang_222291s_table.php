<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabel kategori_222291
        Schema::create('kategori_222291', function (Blueprint $table) {
            $table->id('id_kategori_222291');  // Kolom ID unik untuk kategori
            $table->string('nama_kategori_222291');  // Nama kategori
            $table->timestamps();
        });

        // Tabel lokasi_222291
        Schema::create('lokasi_222291', function (Blueprint $table) {
            $table->id('id_lokasi_222291');  // Kolom ID unik untuk lokasi
            $table->string('nama_lokasi_222291');  // Nama lokasi penyimpanan
            $table->string('keterangan_lokasi_222291')->nullable();  // Keterangan atau deskripsi lokasi
            $table->timestamps();
        });

        // Tabel pengguna_222291
        // Schema::create('pengguna_222291', function (Blueprint $table) {
        //     $table->id('id_pengguna_222291'); // Kolom ID unik untuk pengguna
        //     $table->string('nama_pengguna_222291'); // Nama pengguna
        //     $table->string('email_pengguna_222291')->unique(); // Email pengguna
        //     $table->string('password_pengguna_222291'); // Kata sandi pengguna
        //     $table->string('role_pengguna_222291'); // Peran pengguna (admin, staf, dll.)
        //     $table->timestamps();
        // });

        // Tabel barang_222291
        Schema::create('barang_222291', function (Blueprint $table) {
            $table->id('id_barang_222291');  // Kolom ID unik untuk barang
            $table->string('nama_barang_222291');  // Nama barang
            $table->unsignedBigInteger('kategori_id_222291');  // Foreign Key untuk kategori
            $table->integer('jumlah_222291');  // Jumlah barang yang tersedia
            $table->string('lokasi_222291');  // Lokasi penyimpanan barang
            $table->string('kondisi_222291');  // Kondisi barang (baik, rusak, dll.)
            $table->date('tanggal_masuk_222291');  // Tanggal barang masuk ke inventaris
            $table->text('keterangan_222291')->nullable();  // Keterangan tambahan

            // Menambahkan foreign key constraint
            $table
                ->foreign('kategori_id_222291')
                ->references('id_kategori_222291')
                ->on('kategori_222291')
                ->onDelete('cascade');

            $table->timestamps();
        });

        // Tabel peminjaman_222291
        Schema::create('peminjaman_222291', function (Blueprint $table) {
            $table->id('id_peminjaman_222291');
            $table->string('nama_peminjam_222291');  // Kolom ID unik untuk peminjaman
            $table->unsignedBigInteger('barang_id_222291');  // Foreign Key untuk barang
            // $table->unsignedBigInteger('pengguna_id_222291'); // Foreign Key untuk pengguna
            $table->date('tanggal_peminjaman_222291');  // Tanggal peminjaman barang
            $table->date('tanggal_pengembalian_222291')->nullable();  // Tanggal pengembalian barang
            $table->string('status_peminjaman_222291')->nullable();  // Status peminjaman (dipinjam, dikembalikan, dll.)

            // Menambahkan foreign key constraints
            $table
                ->foreign('barang_id_222291')
                ->references('id_barang_222291')
                ->on('barang_222291')
                ->onDelete('cascade');

            // $table->foreign('pengguna_id_222291')
            //       ->references('id_pengguna_222291')
            //       ->on('pengguna_222291')
            //       ->onDelete('cascade');

            $table->timestamps();
        });

        // Tabel riwayat_barang_222291
        Schema::create('riwayat_barang_222291', function (Blueprint $table) {
            $table->id('id_riwayat_222291');  // Kolom ID unik untuk riwayat
            $table->unsignedBigInteger('barang_id_222291');  // Foreign Key untuk barang
            $table->date('tanggal_riwayat_222291');  // Tanggal perubahan pada barang
            $table->string('jenis_perubahan_222291');  // Jenis perubahan (penambahan, pengurangan, perbaikan)
            $table->integer('jumlah_perubahan_222291');  // Jumlah perubahan
            $table->text('keterangan_riwayat_222291')->nullable();  // Keterangan tambahan

            // Menambahkan foreign key constraint
            $table
                ->foreign('barang_id_222291')
                ->references('id_barang_222291')
                ->on('barang_222291')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_barang_222291');
        Schema::dropIfExists('peminjaman_222291');
        Schema::dropIfExists('barang_222291');
        Schema::dropIfExists('pengguna_222291');
        Schema::dropIfExists('lokasi_222291');
        Schema::dropIfExists('kategori_222291');
    }
};
