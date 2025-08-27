<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adocao;

class FormsController extends Controller
{
    public function execute()
    {
        $forms = Adocao::orderBy('created_at', 'desc')->get();
        return view('pages.admin.forms', compact('forms'));
    }

    public function show($id)
    {
        $form = \App\Models\Adocao::findOrFail($id);
        return view('pages.admin.formsShow', compact('form'));
    }

    public function aprovar($id)
    {
        $form = Adocao::findOrFail($id);
        $form->status = 'aprovado';
        $form->save();

        return redirect()->route('admin.forms')->with('success', 'Formulário aprovado!');
    }

    public function reprovar($id)
    {
        $form = Adocao::findOrFail($id);
        $form->status = 'reprovado';
        $form->save();

        return redirect()->route('admin.forms')->with('error', 'Formulário reprovado!');
    }
}
