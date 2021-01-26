<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model {

    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome_curriculo',
        'email_curriculo',
        'telefone',
        'profissao',
        'experiencia',
        'idioma',
        'site',
        'github',
        'linkedin',
        'linguagens',
        'users',
        'pretensao',
        'whatsapp',
        'cnh',
        'pcd',
        'estagio',
        'nascimento',
    ];

    use HasFactory;
}
