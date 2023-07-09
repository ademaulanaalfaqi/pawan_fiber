<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends ModelAuthenticate
{
    protected $table = 'tunjangan';
    protected $primaryKey = 'id';

    public function rekap()
    {
        return $this->hasMany(TestDataAbsensi::class, 'id_rekap');
    }
}
