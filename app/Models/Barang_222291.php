<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_222291 extends Model
{
    use HasFactory, SoftDeletes;
    protected $table      = 'barang_222291';  // Your barang table name
    protected $primaryKey = 'id_barang_222291';
    protected $fillable   = ['nama_barang_222291', 'kategori_id_222291', 'jumlah_222291', 'lokasi_222291', 'kondisi_222291', 'tanggal_masuk_222291'];

    // Define the relationship to Kategori_222291
    public function kategori()
    {
        return $this->belongsTo(Kategori_222291::class, 'kategori_id_222291', 'id_kategori_222291');
    }
    public function scopeAvailable($query)
{
    return $query->where('jumlah_222291', '>', 0);
}
public function addStock($quantity)
{
    $this->increment('jumlah_222291', $quantity);
}

public function reduceStock($quantity)
{
    if ($this->jumlah_222291 >= $quantity) {
        $this->decrement('jumlah_222291', $quantity);
        return true; // Berhasil mengurangi stok
    }
    return false;
}
}
