<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class QueroAdotarController extends Controller
{
    public function execute()
    {
        return view('pages.quero_adotar');
    }
}
