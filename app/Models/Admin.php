<?php

namespace App\Models;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends ModelAuthenticate
{
    protected $table = 'admin';
}
