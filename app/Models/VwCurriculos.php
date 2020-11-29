<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwCurriculos extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $table = "vw_curriculos";
    protected $casts = [
        'criado_em' => 'datetime:Y-m-d',
    ];

}
