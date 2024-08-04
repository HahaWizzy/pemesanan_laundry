<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Laundry_Member extends Model
{
    use HasFactory;
    protected $table = 'data_laundry_member';
    protected $primaryKey = 'no_transaksi';
    protected $fillable = [
        'tgl_transaksi',
        'member_id',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
