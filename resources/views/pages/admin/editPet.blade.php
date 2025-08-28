@extends('layouts.adm')

@section('title', 'Editar Pet')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/addPet.css') }}">
@endsection

@section('content')
<form class="form-container" method="post" action="{{ route('admin.pets.update', $pet->id) }}" enctype="multipart/form-data">
    @csrf
    <h1>Editar Pet</h1>

    <label for="tipo">Tipo</label>
    <select id="tipo" name="tipo">
        <option value="Gato" {{ $pet->tipo == 'Gato' ? 'selected' : '' }}>Gato</option>
        <option value="Cachorro" {{ $pet->tipo == 'Cachorro' ? 'selected' : '' }}>Cachorro</option>
    </select>

    <label for="mostrar">Mostrar no site</label>
    <select id="mostrar" name="mostrar">
        <option value="1" {{ $pet->mostrar ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ !$pet->mostrar ? 'selected' : '' }}>Não</option>
    </select>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ $pet->nome }}">

    <label for="raca">Raça</label>
    <input type="text" id="raca" name="raca" value="{{ $pet->raca }}">

    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo">
        <option value="Macho" {{ $pet->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
        <option value="Fêmea" {{ $pet->sexo == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
    </select>

    <label for="idade">Idade</label>
    <input type="number" id="idade" name="idade" value="{{ $pet->idade }}">

    <label for="porte">Porte</label>
    <select id="porte" name="porte">
        <option value="P" {{ $pet->porte == 'P' ? 'selected' : '' }}>P</option>
        <option value="M" {{ $pet->porte == 'M' ? 'selected' : '' }}>M</option>
        <option value="G" {{ $pet->porte == 'G' ? 'selected' : '' }}>G</option>
    </select>

    <div>
        <label for="detalhes">Detalhes:</label>
        <div class="detalhes-container">
            @php
                $detalhes = $pet->detalhes ? explode(",", $pet->detalhes) : [];
            @endphp
            @foreach(['Brincalhão','Agressivo','Sociável','Adestrado','Medroso','Calmo','Idoso','Filhote','Vacinado','Castrado','FELV','FIV','Deficiente','Alergias'] as $det)
                <label>
                    <input type="checkbox" name="detalhes[]" value="{{ $det }}" {{ in_array($det, $detalhes) ? 'checked' : '' }}> {{ $det }}
                </label>
            @endforeach
        </div>
    </div>

    <label for="historia">História</label>
    <textarea id="historia" name="historia" rows="3">{{ $pet->historia }}</textarea>

    <label for="complicacoes">Complicações</label>
    <textarea id="complicacoes" name="complicacoes" rows="3">{{ old('complicacoes', $pet->complicacoes) }}</textarea>

    <label for="descricao">Descrição Completa</label>
    <textarea id="descricao" name="descricao" rows="3">{{ $pet->descricao }}</textarea>

<label>Foto principal</label>
<div class="upload-container">
    @php $principal = $pet->imagens->where('principal', true)->first(); @endphp
    <div class="image-wrapper">
        @if($principal)
            <img src="{{ asset('storage/' . $principal->path) }}" alt="Foto principal" class="preview">
        @else
            <img src="{{ asset('images/difusor.png') }}" alt="Placeholder" class="preview">
        @endif
        <label class="button-label">
            Trocar
            <input type="file" name="foto" class="hidden-file-input" />
        </label>
    </div>
</div>

<label>Imagens extras</label>
<div class="extras-container">
    @foreach($pet->imagens->where('principal', false) as $img)
        <div class="image-wrapper">
            <img src="{{ asset('storage/' . $img->path) }}" alt="Imagem extra" class="preview">
            <label class="button-label">
                <input type="checkbox" name="delete_images[]" value="{{ $img->id }}">
                Remover
            </label>
        </div>
    @endforeach
</div>

<label>Adicionar novas imagens extras</label>
<input type="file" name="imagens[]" multiple>

<style>
.upload-container, .extras-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-wrapper {
    display: flex;
    flex-direction: column; /* empilha imagem e botão verticalmente */
    align-items: center;
    width: 150px;
    height: auto; /* altura agora se ajusta ao conteúdo */
}

.image-wrapper img.preview {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.button-label {
    display: inline-block;
    margin-top: 5px;
    cursor: pointer;
    background: #007bff;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
}

.hidden-file-input {
    display: none;
}
</style>


    <div class="submit-btn">
        <button>Salvar alterações 🐾</button>
    </div>
</form>
@endsection
