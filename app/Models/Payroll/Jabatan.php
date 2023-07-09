<?php

namespace App\Models\Payroll;

use App\Models\DataPegawai;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends ModelAuthenticate
{
    protected $table = 'jabatan_payroll';
    protected $fillable = ['nama_jabatan', 'id'];

    public function pegawai()
    {
        return $this->hasMany(DataPegawai::class, 'id_pegawai');
    }
}
