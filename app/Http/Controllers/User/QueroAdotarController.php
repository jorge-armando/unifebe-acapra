<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class QueroAdotarController extends Controller
{
    public function execute()
    {
        return view('user.quero_adotar');
    }
}
