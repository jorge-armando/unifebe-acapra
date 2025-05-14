<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function mostrarTela()
    {
        return view('user.home');
    }
}