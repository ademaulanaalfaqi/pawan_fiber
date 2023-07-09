<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends ModelAuthenticate
{
    protected $table = 'fee_lembur';
    protected $primaryKey = 'id';
}
