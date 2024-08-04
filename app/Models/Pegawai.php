<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nama_pegawai',
        'password',
        'alamat',
        'no_hp',
        'jabatan',
    ];

    public function data_laundry_member()
    {
        return $this->hasMany(Data_Laundry_Member::class, 'id_pegawai');
    }

    public function data_laundry_non_member()
    {
        return $this->hasMany(Data_Laundry_Non_Member::class, 'id_pegawai');
    }

    public function pembelian_baran()
    {
        return $this->hasMany(Pembelian_Barang::class, 'id_pegawai');
    }
}
