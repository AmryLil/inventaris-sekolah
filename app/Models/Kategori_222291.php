<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_222291 extends Model
{
    use HasFactory;

    protected $table = 'kategori_222291'; // Pastikan nama tabel sesuai
    protected $fillable = [
        'nama_kategori_222291',
        'kategori_id_222291'
    ];

    
    // Definisikan relasi ke Barang
    public function barangs()
    {
        return $this->hasMany(Barang_222291::class, 'kategori_id_222291', 'id_kategori_222291');
    }
    
}
