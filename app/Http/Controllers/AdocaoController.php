<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;
use Illuminate\Support\Facades\Storage;
use App\Models\Pet;

class AdocaoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome_completo' => 'required|string|max:255',
                'data_nasc' => 'required|date',
                'email' => 'required|email|max:255',
                'renda_mensal' => 'required|string|max:255',
                'casa_ou_apt' => 'required|string|max:255',
                'propriedade' => 'required|string|max:255',
                'cep' => 'required|string|max:20',
                'estado' => 'required|string|max:2',
                'cidade' => 'required|string|max:255',
                'bairro' => 'required|string|max:255',
                'rua' => 'required|string|max:255',
                'numero' => 'required|string|max:50',
                'cachorro_ou_gato' => 'required|string|max:50',
                'nome_animal' => 'required|string|max:255',
                'condicoes_fisicas' => 'required|string|max:10',
                'castracao_vacinacao' => 'required|string|max:10',
                'adocao_colaborativa' => 'required|string|max:10',
            ]);

            $data = $request->all();

            if ($request->hasFile('doc_identidade')) {
                $data['doc_identidade'] = $request->file('doc_identidade')->store('adocoes_docs', 'public');
            }

            if ($request->hasFile('foto_local')) {
                $data['foto_local'] = $request->file('foto_local')->store('adocoes_docs', 'public');
            }

            if ($request->hasFile('foto_outros_animais')) {
                $data['foto_outros_animais'] = $request->file('foto_outros_animais')->store('adocoes_docs', 'public');
            }

            if ($request->hasFile('foto_telas')) {
                $data['foto_telas'] = $request->file('foto_telas')->store('adocoes_docs', 'public');
            }

            Adocao::create($data);

            return redirect('/enviado')->with('success', 'Formulário enviado com sucesso!');
        } catch (\Exception $e) {
            // Exibe o erro diretamente na tela
            dd($e->getMessage(), $e->getTraceAsString());
        }
    }
    public function create($id = null)
    {
        $pet = null;

        if ($id) {
            $pet = Pet::find($id);
            if(!$pet) {
                return redirect('/quero-adotar')->with('error', 'Pet não encontrado.');
            }
        }

        return view('pages.quero_adotar', compact('pet'));
    }
}
