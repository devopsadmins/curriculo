<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridades extends Model
{
    public $timestamps = false;
    public $table="escolaridade";
    use HasFactory;
}
