<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; 
    protected $primaryKey = 'kd_pelanggans'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kd_pelanggans',
        'nama_pelanggan',
        'no_telepon',
    ];
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'kd_pelanggans', 'kd_pelanggans');
    }
   
    
}

