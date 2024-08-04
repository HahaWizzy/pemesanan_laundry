<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $fillable = [
        'no_identitas',
        'nama_member',
        'password',
        'alamat',
        'no_hp',
        'tgl_join',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'member_id');
    }
}
