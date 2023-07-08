<?php

namespace App\Models\Payroll;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends ModelAuthenticate
{
    protected $table = 'potongan';
    protected $primaryKey = 'id';
}
