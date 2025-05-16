<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ListaHomeController extends Controller
{
    private $pets = [
    1 => [
        'id' => 1,
        'nome' => 'Difusor',
        'sexo' => 'Macho',
        'idade' => 12,
        'porte' => 'pequeno',
        'imagem' => '/img/gato1.jpg',
        'historia' => 'Difusor é um gatinho macho, que foi encontrado em uma fábrica de peças automotivas (por isso o nome), chegou em estado caquético, com extrema magreza.',
        'descricao' => 'Difusor é um gatinho macho, que foi encontrado em uma fábrica de peças automotivas (por isso o nome), chegou em estado caquético... está 100% saudável e pronto para um novo lar.',
        'complicacoes' => 'Desnutrição, mas está em recuperação.',
        'detalhes' => ['Castrado', 'Vacinado', 'Brincalhão', 'FELV+'],
        'tipo' => 'Gato',
        'situacao' => 'Adotado'
    ],
    2 => [
        'id' => 2,
        'nome' => 'Bolt',
        'sexo' => 'Macho',
        'idade' => 3,
        'porte' => 'médio',
        'imagem' => '/img/cachorro1.jpg',
        'historia' => 'Bolt foi abandonado na estrada e resgatado por voluntários.',
        'descricao' => 'Bolt é muito carinhoso, ótimo com crianças e precisa de espaço para brincar.',
        'complicacoes' => null,
        'detalhes' => ['Vacinado', 'Castrado'],
        'tipo' => 'Cachorro',
        'situacao' => 'Para adoção'
    ],
    3 => [
        'id' => 3,
        'nome' => 'Mia',
        'sexo' => 'Fêmea',
        'idade' => 5,
        'porte' => 'grande',
        'imagem' => '/img/cachorro2.jpg',
        'historia' => 'Mia vivia nas ruas com seus filhotes. Foi resgatada desnutrida.',
        'descricao' => 'Já recuperada, Mia adora brincar com outros cães e passear.',
        'complicacoes' => null,
        'detalhes' => ['Castrada', 'Brincalhona'],
        'tipo' => 'Cachorro',
        'situacao' => 'Para adoção'
    ],
];

    public function execute()
    {
        $pets=$this->pets;
        return view('user.lista',compact("pets"));
    }
}