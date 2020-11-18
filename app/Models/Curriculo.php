<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model {

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'email',
        'telefone',
        'profissao',
        'experiencia',
        'idioma',
        'site',
        'github',
        'linkedin',
        'linguagens',
        'users'
    ];

    use HasFactory;
}
