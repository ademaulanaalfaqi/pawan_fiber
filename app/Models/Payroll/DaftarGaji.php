<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarGaji extends ModelAuthenticate
{
    protected $table = 'daftar_gaji';

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function pegawai()
    {
        return $this->hasMany(DataPegawai::class, 'id_pegawai');
    }

    public function getPeriodeStringAttribute()
    {
        return Carbon::parse($this->attributes['periode'])->translatedFormat('F Y');
    }
}
