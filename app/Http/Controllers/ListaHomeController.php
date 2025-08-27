<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;

class ListaHomeController extends Controller
{
    public function execute()
    {
        // Carrega os pets com imagens
        $pets = Pet::with('imagens')->get();

        return view('pages.lista', compact('pets'));
    }
}
