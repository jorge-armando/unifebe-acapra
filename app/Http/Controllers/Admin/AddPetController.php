<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class AddPetController extends Controller
{
    public function execute($id)
    {
        $pet = Pet::with('imagens')->findOrFail($id);
        return view('admin.editPet', compact('pet'));
    }
}
