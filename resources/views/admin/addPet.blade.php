@extends('layouts.adm')
@section('title', 'Adicionar Pet')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/addPet.css') }}">
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-container" method="post" action="{{ route('admin.pets.store') }}" enctype="multipart/form-data">
    @csrf
    <h1>Adicionar Pet</h1>

    <label for="tipo">Tipo</label>
    <select id="tipo" name="tipo">
        <option value="Gato">Gato</option>
        <option value="Cachorro">Cachorro</option>
    </select>

    <label for="mostrar">Mostrar no site</label>
    <select id="mostrar" name="mostrar">
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome', '') }}">

    <label for="raca">Raça</label>
    <input type="text" id="raca" name="raca" value="{{ old('raca', '') }}">

    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo">
        <option value="Macho">Macho</option>
        <option value="Fêmea">Fêmea</option>
    </select>

    <label for="idade">Idade</label>
    <input type="number" id="idade" name="idade" value="{{ old('idade', '') }}">

    <label for="porte">Porte</label>
    <select id="porte" name="porte">
        <option value="P">P</option>
        <option value="M">M</option>
        <option value="G">G</option>
    </select>

    <div>
        <label for="detalhes">Detalhes:</label>
        <div class="detalhes-container">
            @php
                $options = ['Brincalhão','Agressivo','Sociável','Adestrado','Medroso','Calmo','Idoso','Filhote','Vacinado','Castrado','FELV','FIV','Deficiente','Alergias'];
                $oldDetalhes = old('detalhes', []);
            @endphp
            @foreach($options as $option)
                <label>
                    <input type="checkbox" name="detalhes[]" value="{{ $option }}"
                        {{ in_array($option, $oldDetalhes) ? 'checked' : '' }}>
                    {{ $option }}
                </label>
            @endforeach
        </div>
    </div>

    <label for="historia">História</label>
    <textarea id="historia" name="historia" rows="3">{{ old('historia') }}</textarea>

    <label for="complicacoes">Complicações</label>
    <textarea id="complicacoes" name="complicacoes" rows="3">{{ old('complicacoes') }}</textarea>

    <label for="descricao">Descrição Completa</label>
    <textarea id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>

    <label>Foto principal</label>
    <input type="file" name="foto" />

    <label>Imagens extras</label>
    <input type="file" name="imagens[]" multiple>

    <div class="submit-btn">
        <button type="submit">Salvar 🐾</button>
    </div>
</form>

@endsection
