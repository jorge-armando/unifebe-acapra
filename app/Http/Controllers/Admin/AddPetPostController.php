<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AddPetPostController extends Controller
{
    // Exibe o formulário para adicionar um pet
    public function execute()
    {
        return view('pages.admin.addPet');
    }

    // Salva um novo pet no banco
    public function store(Request $request)
    {
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
                'detalhes' => is_array($request->detalhes) ? implode(",", $request->detalhes) : $request->detalhes,
                'historia' => $request->historia,
                'complicacoes' => $request->complicacoes,
                'descricao' => $request->descricao,
            ]);

            // Salva foto principal
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('pets', 'public');
                $pet->imagens()->create([
                    'path' => $path,
                    'principal' => true,
                ]);
            }

            // Salva imagens extras
            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    $path = $imagem->store('pets', 'public');
                    $pet->imagens()->create([
                        'path' => $path,
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

    public function update(Request $request, $id)
    {
        $pet = Pet::with('imagens')->findOrFail($id);

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
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'imagens.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // 1) Atualiza campos básicos
            $pet->update([
                'tipo' => $request->tipo,
                'mostrar' => (bool)$request->mostrar,
                'nome' => $request->nome,
                'raca' => $request->raca,
                'sexo' => $request->sexo,
                'idade' => $request->idade,
                'porte' => $request->porte,
                'detalhes' => $request->detalhes ? implode(",", $request->detalhes) : null,
                'historia' => $request->historia,
                'complicacoes' => $request->complicacoes,
                'descricao' => $request->descricao,
            ]);

            // 2) Remove imagens marcadas
            $deleteIds = $request->input('delete_images', []);
            if (!empty($deleteIds)) {
                foreach ($deleteIds as $imgId) {
                    $img = $pet->imagens()->where('id', $imgId)->first();
                    if ($img) {
                        if (Storage::disk('public')->exists($img->path)) {
                            Storage::disk('public')->delete($img->path);
                        }
                        $img->delete();
                    }
                }
            }

            // 3) Troca de foto principal via upload
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('pets', 'public');

                // Desmarca qualquer principal atual
                $pet->imagens()->update(['principal' => false]);

                // Cria nova principal
                $pet->imagens()->create([
                    'path' => $path,
                    'principal' => true,
                ]);

                $pet->refresh(); // 🔹 atualiza o model e relacionamento
            } 
            // 4) Seleciona imagem existente como principal
            elseif ($request->filled('principal')) {
                $principalId = (int) $request->principal;
                if (!in_array($principalId, $deleteIds)) {
                    $pet->imagens()->update(['principal' => false]);
                    $pet->imagens()->where('id', $principalId)->update(['principal' => true]);
                    $pet->refresh(); // 🔹 garante que $pet->imagens esteja atualizado
                }
            }

            // 5) Adiciona novas imagens extras
            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $imagem) {
                    $path = $imagem->store('pets', 'public');
                    $pet->imagens()->create([
                        'path' => $path,
                        'principal' => false,
                    ]);
                }
                $pet->refresh(); // 🔹 atualiza coleção de imagens
            }

            // 6) Se não houver nenhuma principal, define a primeira existente
            if (!$pet->imagens()->where('principal', true)->exists()) {
                $first = $pet->imagens()->first();
                if ($first) {
                    $first->update(['principal' => true]);
                    $pet->refresh(); // 🔹 garante que Blade veja a principal
                }
            }

            DB::commit();

            return redirect()->route('admin.pets.index')
                ->with('success', 'Pet atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['erro' => 'Falha ao atualizar pet: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // Remove um pet e suas imagens
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        foreach ($pet->imagens as $img) {
            if (Storage::disk('public')->exists($img->path)) {
                Storage::disk('public')->delete($img->path);
            }
        }

        $pet->delete();

        return redirect()->route('admin.pets.index')
            ->with('success', 'Pet removido com sucesso!');
    }
}
