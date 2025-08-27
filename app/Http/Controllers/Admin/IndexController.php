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

        return view('pages.admin.index', compact('pets'));
    }
}
