<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AnimalHomeController extends Controller
{
    public function execute()
    {
        return view('user.animal');
    }
}