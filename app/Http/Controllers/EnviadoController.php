<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EnviadoController extends Controller
{
    public function execute()
    {
        return view('pages.enviado_sucesso');
    }
}
