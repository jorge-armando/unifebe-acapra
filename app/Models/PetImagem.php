<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetImagem extends Model
{
    // Força o Eloquent a usar o nome correto da tabela
    protected $table = 'pet_imagens';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'pet_id',   // Relacionamento com a tabela pets
        'caminho',  // Caminho da imagem no storage
        'principal' // Booleano: true se for a imagem principal
    ];

    // Casts para tipos corretos
    protected $casts = [
        'principal' => 'boolean', // Converte automaticamente para bool
    ];

    /**
     * Relacionamento com o pet
     * Cada imagem pertence a um pet
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Escopo para imagens principais
     */
    public function scopePrincipal($query)
    {
        return $query->where('principal', true);
    }
}
