<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet'; // nome da tabela correta

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

    public function imagens()
    {
        // relaciona com pet_imagem (coluna id_pet)
        return $this->hasMany(PetImagem::class, 'id_pet', 'id');
    }
}
