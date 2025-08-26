<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class AddPetPostController extends Controller
{
    public function execute()
    {
        return view('admin.addPet');
    }

   public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'mostrar' => 'required|boolean',
            'nome' => 'required|string|max:255',
            'sexo' => 'required|string',
            'idade' => 'required|integer',
            'porte' => 'required|string',
            'detalhes' => 'nullable|array',
            'historia' => 'nullable|string',
            'complicacoes' => 'nullable|string',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'imagens.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // valida várias imagens
        ]);

        // salva a foto principal
        $fotoPath = $request->hasFile('foto') 
            ? $request->file('foto')->store('pets', 'public') 
            : null;

        // cria o pet e guarda na variável
        $pet = Pet::create([
            'tipo' => $request->tipo,
            'mostrar' => $request->mostrar,
            'raca' => $request->raca,
            'nome' => $request->nome,
            'sexo' => $request->sexo,
            'idade' => $request->idade,
            'porte' => $request->porte,
            'detalhes' => $request->detalhes ?? [],
            'historia' => $request->historia,
            'complicacoes' => $request->complicacoes,
            'descricao' => $request->descricao,
            'foto' => $fotoPath,
        ]);

        // salva as imagens extras
        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $imagem) {
                $path = $imagem->store('pets', 'public');
                $pet->imagens()->create([
                    'caminho' => $path
                ]);
            }
        }

        return redirect('/admin/pets')->with('success', 'Pet adicionado com sucesso!');
    }

}
