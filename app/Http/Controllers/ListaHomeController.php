<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetImagem;

class ListaHomeController extends Controller
{
    public function execute()
    {
        $query = Pet::query();

        // -------- Filtro por tipo (Gato/Cachorro) --------
        $tipos = request()->get('tipo', []); // array ou vazio
        if (!empty($tipos)) {
            // normaliza para Capitalizado (Gato/Cachorro)
            $tiposNorm = array_map(function ($v) {
                $v = trim($v);
                return mb_convert_case($v, MB_CASE_TITLE, 'UTF-8'); // gato -> Gato
            }, (array)$tipos);

            $query->whereIn('tipo', $tiposNorm);
        }

        // -------- Filtro por porte --------
        $porteInput = request()->get('porte', []); // pode vir 'P','M','G' ou 'pequeno','médio','grande'
        if (!empty($porteInput)) {
            $map = [
                'P' => 'pequeno',
                'M' => 'médio',
                'G' => 'grande',
                'GG' => 'gigante', // se você usar GG no futuro
            ];

            $portesNorm = [];
            foreach ((array)$porteInput as $p) {
                $p = trim($p);
                // mapeia letra -> texto, ou deixa como veio
                $portesNorm[] = $map[$p] ?? $p;
            }

            // remove duplicados
            $portesNorm = array_values(array_unique($portesNorm));

            $query->whereIn('porte', $portesNorm);
        }

        // -------- Filtro por idade --------
        $minIdade = (int) request()->get('idade_min', 0);
        $maxIdade = (int) request()->get('idade_max', 30);
        if ($minIdade > $maxIdade) {
            [$minIdade, $maxIdade] = [$maxIdade, $minIdade];
        }
        $query->whereBetween('idade', [$minIdade, $maxIdade]);

        // Executa a query
        $pets = $query->get();

        // Anexa caminho da imagem principal (se houver)
        foreach ($pets as $pet) {
            $pet->imagem = PetImagem::where('id_pet', $pet->id)
                ->where('principal', '1 ')
                ->value('path');
        }

        return view('pages.lista', compact('pets'));
    }
}
