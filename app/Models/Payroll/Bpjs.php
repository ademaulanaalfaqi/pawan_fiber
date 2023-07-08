<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpjs extends ModelAuthenticate
{
    protected $table = 'bpjs';
    protected $primaryKey = 'id';
}
