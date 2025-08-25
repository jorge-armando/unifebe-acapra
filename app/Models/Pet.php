<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'raca',
        'sexo',
        'idade',
        'porte',
        'detalhes',
        'historia',
        'complicacao',
        'descricao',
    ];
}