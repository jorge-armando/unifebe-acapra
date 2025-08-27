<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $query = Pet::query();

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
            $viewData["petList"][] = [
                "id" => $pet->id,
                "name" => $pet->nome,
                "imagePath" => count($pet->imagens) > 0 ? asset('storage/' . $pet->imagens[0]->path) : asset('images/difusor.png')
            ];
        }

        return view('pages.admin.index', $viewData);
    }
}
