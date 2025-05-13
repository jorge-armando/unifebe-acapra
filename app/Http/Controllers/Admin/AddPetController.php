<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AddPetController extends Controller
{
    public function execute()
    {
        return view('admin.addPet');
    }
}
