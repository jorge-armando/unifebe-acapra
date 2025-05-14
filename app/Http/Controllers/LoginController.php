<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function execute()
    {
        return view('pages.login');
    }
}
