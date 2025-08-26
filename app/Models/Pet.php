<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // garante que use a tabela "pets"
    protected $table = 'pets';

    protected $fillable = [
        'tipo','mostrar','nome','raca','sexo','idade','porte',
        'detalhes','historia','complicacoes','descricao','foto',
    ];

    protected $casts = [
        'detalhes' => 'array',
        'mostrar' => 'boolean',
    ];

    public function imagens()
    {
        return $this->hasMany(PetImagem::class, 'pet_id');
    }
}
