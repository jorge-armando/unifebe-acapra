<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AddPetController extends Controller
{
    public function mostrarTela()
    {
        return view('admin.addPet');
    }
}
