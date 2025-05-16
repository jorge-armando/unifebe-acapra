<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AnimalHomeController extends Controller
{
    public function mostrarTela()
    {
        return view('user.animal');
    }
}