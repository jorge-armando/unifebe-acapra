<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CadastroController extends Controller
{
    public function execute()
    {
        return view('pages.cadastro');
    }
}
