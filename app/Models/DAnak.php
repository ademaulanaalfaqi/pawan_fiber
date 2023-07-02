<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DAnak extends Model
{
    protected $table = 'data_anak';

    function DAnak()
    {
        return $this->belongsTo(DAnak::class, 'id_keluarga');
    }
}
