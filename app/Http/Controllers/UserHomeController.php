<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function execute()
    {
        return view('pages.home');
    }
}