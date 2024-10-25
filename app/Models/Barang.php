<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs'; 
    protected $primaryKey = 'kd_barangs'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kd_barangs',
        'stok_barang',
        'nama_barang',
        'deskripsi',
        'harga'
    ];

    protected $casts = [
        'harga' => 'float',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'kd_barangs', 'kd_barangs');
    }
  
    

}
