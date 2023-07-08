<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDataAbsensi extends ModelAuthenticate
{
    protected $table = 'test_rekap';
    protected $primaryKey = 'id';

    public function tunjangan()
	{
		return $this->belongsTo(Tunjangan::class, 'id_tunjangan');
	}

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
