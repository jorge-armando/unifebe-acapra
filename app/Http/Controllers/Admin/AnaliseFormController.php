<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adocao;

class AnaliseFormController extends Controller
{
    // Mostrar o formulário de adoção específico
    public function execute($id)
    {
        // Busca o formulário pelo ID
        $adocao = Adocao::find($id);

        if (!$adocao) {
            return redirect('/admin/forms')->with('error', 'Formulário não encontrado.');
        }

        // Envia os dados para a view
        return view('admin.analise_formulario', compact('adocao'));
    }

    // Atualizar status (aprovado ou reprovado)
    public function updateStatus(Request $request, $id)
    {
        $adocao = Adocao::find($id);

        if (!$adocao) {
            return redirect('/admin/forms')->with('error', 'Formulário não encontrado.');
        }

        // Atualiza o status do formulário
        $adocao->status = $request->input('status'); // 'aprovado' ou 'reprovado'
        $adocao->save();

        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
