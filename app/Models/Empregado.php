<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empregado extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'departamento',
        'salario',
        'status',
        'contrato_em',
    ];

    protected $casts = [
        'contrato_em' => 'date',
    ];
}
