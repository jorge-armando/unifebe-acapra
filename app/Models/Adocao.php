<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, só se não seguir padrão Laravel)
    protected $table = 'adocoes';

    // Campos que podem ser preenchidos em massa (fillable)
    protected $fillable = [
        'nome_completo',
        'data_nasc',
        'email',
        'renda_mensal',
        'casa_ou_apt',
        'propriedade',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'ponto_ref',
        'cachorro_ou_gato',
        'nome_animal',
        'outros_animais',
        'castrados_e_vacinados',
        'espaco_adequado',
        'acesso_rua',
        'qual_local',
        'tem_telas',
        'gato_acesso_rua',
        'doc_identidade',
        'foto_local',
        'foto_outros_animais',
        'foto_telas',
        'condicoes_fisicas',
        'castracao_vacinacao',
        'adocao_colaborativa',
        'status', 
    ];
}
