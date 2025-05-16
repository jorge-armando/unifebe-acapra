@extends('layouts.adm')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')
    <div class="busca-container">
        <button>Buscar</button>
        <input type="text" placeholder="Digite para buscar...">
    </div>

    <div class="card">
        <img src="/images/difusor.png" alt="Pet">
        <div class="nome">Difusor</div>
        <div class="botoes">
            <button>Editar pet</button>
            <button>Remover Pet</button>
        </div>
    </div>

    <div class="card">
        <img src="/images/difusor.png" alt="Pet">
        <div class="nome">Difusor</div>
        <div class="botoes">
            <button>Editar pet</button>
            <button>Remover Pet</button>
        </div>
    </div>
@endsection
