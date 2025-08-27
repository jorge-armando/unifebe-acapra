public function index(Request $request)
{
    $busca = $request->input('busca', '');

    $pets = Pet::with('imagens')
        ->when($busca, fn($q) => $q->where('raca', 'like', "%{$busca}%"))
        ->get();

    return view('admin.pets.index', compact('pets', 'busca'));
}

public function destroy(Pet $pet)
{
    // Remove imagens do storage
    foreach ($pet->imagens as $img) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($img->path);
    }

    $pet->delete();

    return redirect()->route('admin.pets.index')->with('success', 'Pet removido com sucesso!');
}
