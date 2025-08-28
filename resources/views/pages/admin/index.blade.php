@extends('layouts.adm')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="busca-container">
    <form method="get" action="{{ route('admin.pets.index') }}">
        <input type="text" name="search" placeholder="Digite para buscar..." value="{{ request('search') }}">
        <button type="submit">Buscar</button>
    </form>
</div>

<div class="cards-container">
    @forelse($petList as $pet)
        <div class="card">
            <img src="{{ $pet['imagePath'] }}" alt="Pet">

            <div class="nome">{{ $pet['name'] }}</div>
            <div class="botoes">
                <a href="{{ route('admin.pets.edit', $pet['id']) }}">Editar pet</a>
                <form method="POST" action="{{ route('admin.pets.destroy', $pet['id']) }}" style="display:inline;">
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