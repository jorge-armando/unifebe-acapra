<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetImagem extends Model
{
    protected $table = 'pet_imagem';

    protected $fillable = [
        'id_pet',
        'tipo',
        'path',
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
        return $this->belongsTo(Pet::class, 'id_pet', 'id');
    }

    /**
     * Escopo para imagens principais
     */
    public function scopePrincipal($query)
    {
        return $query->where('principal', true);
    }
}
