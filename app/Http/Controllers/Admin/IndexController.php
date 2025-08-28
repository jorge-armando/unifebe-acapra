<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $query = Pet::with('imagens'); // já carrega as imagens

        // Filtro de busca
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nome', 'like', "%$search%")
                ->orWhere('raca', 'like', "%$search%");
        }

        $pets = $query->orderBy('created_at', 'desc')->get();

        $viewData = [
            "petList" => []
        ];

        foreach ($pets as $pet) {
            $principal = $pet->imagens->firstWhere('principal', true);
            $viewData["petList"][] = [
                "id" => $pet->id,
                "name" => $pet->nome,
                "imagePath" => $principal ? asset('storage/' . $principal->path) : asset('images/difusor.png')
            ];
        }

        return view('pages.admin.index', $viewData);
    }
}
