<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AddPetPostController extends Controller
{
    public function execute()
    {
        return view('admin.addPet');
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'tipo' => 'required|string',
            'mostrar' => 'required|boolean',
            'nome' => 'required|string|max:255',
            'raca' => 'nullable|string|max:255',
            'sexo' => 'required|string',
            'idade' => 'required|integer',
            'porte' => 'required|string',
            'detalhes' => 'nullable|array',
            'historia' => 'nullable|string',
            'complicacoes' => 'nullable|string',
            'descricao' => 'nullable|string',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'imagens.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Cria o pet
            $pet = Pet::create([
                'tipo' => $request->tipo,
                'mostrar' => (bool)$request->mostrar,
                'nome' => $request->nome,
                'raca' => $request->raca,
                'sexo' => $request->sexo,
                'idade' => $request->idade,
                'porte' => $request->porte,
                'detalhes' => $request->detalhes ?? [],
                'historia' => $request->historia,
                'complicacoes' => $request->complicacoes,
                'descricao' => $request->descricao,
            ]);

            // Salva foto principal
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('pets', 'public');
                $pet->imagens()->create([
                    'caminho' => $path,
                    'principal' => true,
                ]);
            }

            // Salva imagens extras
            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    $path = $imagem->store('pets', 'public');
                    $pet->imagens()->create([
                        'caminho' => $path,
                        'principal' => false,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.pets.index')
                ->with('success', 'Pet adicionado com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['erro' => 'Falha ao salvar pet: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
