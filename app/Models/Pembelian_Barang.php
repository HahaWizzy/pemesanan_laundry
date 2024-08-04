<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Barang extends Model
{
    use HasFactory;
    protected $table = 'pembelian_barang';
    protected $primaryKey = 'id_pembelian';
    protected $fillable = [
        'kode_barang',
        'id_pegawai',
        'tanggal',
        'jumlah',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kode_barang');
    }
}
