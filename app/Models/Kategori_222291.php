<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_222291 extends Model
{
    use HasFactory;

    protected $table = 'kategori_222291'; // Nama tabel

    // Tentukan kolom primary key
    protected $primaryKey = 'id_kategori_222291'; // Ganti dengan nama kolom primary key yang benar

    // Jika kolom primary key bukan auto-increment, set ini ke false
    public $incrementing = true; // Set true jika kolom ini auto-increment

    // Kolom yang dapat diisi
    protected $fillable = ['nama_kategori_222291'];

    // Jika ada relasi
    public function barangs()
    {
        return $this->hasMany(Barang_222291::class, 'kategori_id_222291', 'id_kategori_222291');
    }
}