<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetImagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pet',
        'tipo',
        'path',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'id_pet');
    }
}