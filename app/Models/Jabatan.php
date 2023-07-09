<?php

namespace App\Models;

use App\Models\DataPegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['nama_jabatan', 'id'];

    public function pegawai()
    {
        return $this->hasMany(DataPegawai::class, 'id_pegawai');
    }
}
