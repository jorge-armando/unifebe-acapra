<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetImagem;
use Illuminate\Http\Request;

class ListaHomeController extends Controller
{
    public function execute(Request $request)
    {
        $query = Pet::query();

        // -------- Filtro por tipo (Gato/Cachorro) --------
        $tipos = $request->get('tipo', []);
        if (!empty($tipos)) {
            // normaliza para Capitalizado (Gato/Cachorro)
            $tiposNorm = array_map(function ($v) {
                return mb_convert_case(trim($v), MB_CASE_TITLE, 'UTF-8');
            }, (array) $tipos);

            $query->whereIn('tipo', $tiposNorm);
        }

        // -------- Filtro por porte --------
        $portes = $request->get('porte', []);
        if (!empty($portes)) {
            // Mapeia os valores do form para os valores do banco
            $map = [
                'pequeno' => 'P',
                'médio' => 'M',
                'grande' => 'G',
            ];

            $portesNorm = [];
            foreach ((array) $portes as $p) {
                $p = trim($p);
                if (isset($map[$p])) {
                    $portesNorm[] = $map[$p];
                }
            }

            // remove duplicados
            $portesNorm = array_values(array_unique($portesNorm));

            $query->whereIn('porte', $portesNorm);
        }

        // -------- Filtro por idade --------
        $minIdade = (int) $request->get('idade_min', 0);
        $maxIdade = (int) $request->get('idade_max', 30);

        if ($minIdade > $maxIdade) {
            [$minIdade, $maxIdade] = [$maxIdade, $minIdade];
        }

        $query->whereBetween('idade', [$minIdade, $maxIdade]);

        // -------- Recupera pets --------
        $pets = $query->get();

        // -------- Anexa imagem principal --------
        foreach ($pets as $pet) {
            $pet->imagem = PetImagem::where('id_pet', $pet->id)
                ->where('principal', 1)
                ->value('path');
        }

        return view('pages.lista', compact('pets'));
    }
}
