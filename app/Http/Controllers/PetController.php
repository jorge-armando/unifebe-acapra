<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function show($id)
    {
        $pet = Pet::findOrFail($id);

        if (!is_array($pet->detalhes)) {
            $detalhes = json_decode($pet->detalhes, true);

            if (!$detalhes) {
                $detalhes = explode(',', $pet->detalhes);
            }

            $detalhes = array_map('trim', $detalhes);

            $pet->detalhes = $detalhes;
        }

        return view('pages.animal', compact('pet'));
    }
}
