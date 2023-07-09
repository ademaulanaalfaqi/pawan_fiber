<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DKeluarga extends Model
{
    protected $table = 'data_keluarga';

    function DKeluarga()
    {
        return $this->belongsTo(DKeluarga::class, 'id_user');
    }
}
