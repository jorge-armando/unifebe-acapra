<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AnimalHomeController extends Controller
{
    public function execute()
    {
        return view('pages.animal');
    }
}