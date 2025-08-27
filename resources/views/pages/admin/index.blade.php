@extends('layouts.adm')

@section('title', 'Página Inicial')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')

<!-- Busca -->
<div class="busca-container">
    <form method="get" action="{{ route('admin.pets.index') }}">
        <input type="text" name="search" placeholder="Digite para buscar..." value="{{ request('search') }}">
        <button type="submit">Buscar</button>
    </form>
</div>

<!-- Mensagem de sucesso -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Lista de pets -->
<div class="cards-container">
    @forelse($pets as $pet)
        <div class="card">
            @php
                // Foto principal ou placeholder
                $foto = $pet->fotoPrincipal ? asset('storage/' . $pet->fotoPrincipal->path) : asset('images/difusor.png');
            @endphp

            <img src="{{ $foto }}" alt="Pet">

            <div class="nome">{{ $pet->nome }}</div>

            <div class="botoes">
                <!-- Editar pet -->
                <a href="{{ route('admin.pets.edit', $pet->id) }}">Editar pet</a>

                <!-- Remover pet -->
                <form method="POST" action="{{ route('admin.pets.destroy', $pet->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja remover este pet?')">Remover Pet</button>
                </form>
            </div>
        </div>
    @empty
        <p>Nenhum pet encontrado.</p>
    @endforelse
</div>

@endsection
