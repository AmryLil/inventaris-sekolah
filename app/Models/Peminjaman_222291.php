<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_222291 extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_222291';

    protected $primaryKey = 'id_peminjaman_222291';

    protected $fillable = [
        'barang_id_222291',
        'tanggal_peminjaman_222291',
        'tanggal_pengembalian_222291',
        'status_peminjaman_222291',
    ];

    // Relasi dengan model Barang_222291
    public function barang()
    {
        return $this->belongsTo(Barang_222291::class, 'barang_id_222291');
    }
}