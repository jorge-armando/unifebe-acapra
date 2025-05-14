<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AnaliseFormController extends Controller
{
    public function execute()
    {
        return view('admin.analise_formulario');
    }
}
