<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function execute()
    {
        return view('user.home');
    }
}