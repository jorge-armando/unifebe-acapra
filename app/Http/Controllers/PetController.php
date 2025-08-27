<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Mostra os detalhes de um pet específico
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pages.animal', compact('pet'));
    }
}
