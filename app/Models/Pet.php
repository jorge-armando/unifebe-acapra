<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'tipo', 'mostrar', 'nome', 'raca', 'sexo', 
        'idade', 'porte', 'detalhes', 'historia', 
        'complicacoes', 'descricao'
    ];

    protected $casts = [
        'detalhes' => 'array',
    ];

    public function imagens()
    {
        return $this->hasMany(PetImagem::class);
    }

    public function fotoPrincipal()
    {
        return $this->hasOne(PetImagem::class)->where('principal', true);
    }
}
