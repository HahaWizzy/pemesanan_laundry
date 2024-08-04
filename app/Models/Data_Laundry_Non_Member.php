<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Laundry_Non_Member extends Model
{
    use HasFactory;
    protected $table = 'data_laundry_non_member';
    protected $primaryKey = 'no_transaksi';
    protected $fillable = [
        'tgl_transaksi',
        'nama_customer',
        'alamat',
        'no_telp',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
