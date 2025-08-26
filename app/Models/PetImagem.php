<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetImagem extends Model
{
    // Força o Eloquent a usar o nome correto da tabela
    protected $table = 'pet_imagens';

    protected $fillable = ['pet_id', 'caminho', 'principal'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
