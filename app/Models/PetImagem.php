<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetImagem extends Model
{
    use HasFactory;

    protected $table = 'pet_imagens'; // força o nome correto da tabela

    protected $fillable = [
        'pet_id',
        'caminho',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
