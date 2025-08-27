<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function execute(Request $request)
    {
        if (Auth::check()) {
            return redirect('/admin');
        }

        return view('pages.admin.login');
    }

    public function post(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user_name', Auth::user()->name);
            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'Email ou senha inválidos',
        ])->onlyInput('email');

        return redirect('/admin/login');
    }
}
