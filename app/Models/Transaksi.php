<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'kd_transaksis'; // Menetapkan primary key

    protected $keyType = 'string'; // Menetapkan tipe primary key sebagai string (UUID)

    public $incrementing = false; // Tidak ada penambahan increment pada UUID

    protected $fillable = [
        'kd_transaksis',
        'kd_customers',
        'kd_barangs',
        'tgl_transaksi',
        'berat',
        'total_bayar',
         'catatan',
          
    ];

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'kd_pelanggans', 'kd_Pelanggans');
    }
    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'kd_barangs', 'Kd_barangs');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
 

  
}

