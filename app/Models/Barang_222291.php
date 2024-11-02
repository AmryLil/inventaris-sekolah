<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_222291 extends Model
{
    protected $table      = 'barang_222291';  // Your barang table name
    protected $primaryKey = 'id_barang_222291';
    protected $fillable   = ['nama_barang_222291', 'kategori_id_222291', 'jumlah_222291', 'lokasi_222291', 'kondisi_222291', 'tanggal_masuk_222291'];

    // Define the relationship to Kategori_222291
    public function kategori()
    {
        return $this->belongsTo(Kategori_222291::class, 'kategori_id_222291', 'id_kategori_222291');
    }
}
