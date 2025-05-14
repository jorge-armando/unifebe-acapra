<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class EnviadoController extends Controller
{
    public function execute()
    {
        return view('user.enviado_sucesso');
    }
}
