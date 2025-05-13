<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FormsController extends Controller
{
    public function execute()
    {
        return view('admin.forms');
    }
}
