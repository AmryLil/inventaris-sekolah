<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_222291 extends Model
{
    use HasFactory;

    protected $table = 'barang_222291'; 
    protected $primaryKey = 'id_barang_222291';// Pastikan nama tabel sesuai
    protected $fillable = [
        'nama_barang_222291',
        'kategori_id_222291', // Pastikan nama field sesuai dengan nama di database
        'jumlah_222291',
        'lokasi_222291',
        'kondisi_222291',
        'tanggal_masuk_222291',
        'keterangan_222291',
    ];

    // Definisikan relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori_222291::class, 'id_kategori_222291', 'kategori_id_222291');
    }
}
