<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Kategori_222291 extends Model
{
    protected $table = 'kategori_222291'; // Your kategori table name
    protected $fillable = ['nama_kategori_222291'];

    // If needed, define a relationship back to Barang_222291
    public function barangs()
    {
        return $this->hasMany(Barang_222291::class, 'kategori_id_222291', 'id_kategori_222291');
    }
}