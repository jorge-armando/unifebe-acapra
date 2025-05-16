@extends('layouts.default')

@section('title', 'Página Inicial')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/user/listahome.css') }}">
@endsection

@section('content')
  <h2>Lista de pets</h2>
  <div class="container-pets">
    <div class="filtros">
    <h3>Filtros</h3>
    <button>Resetar filtros</button>

    <div>
      <strong>Tipo de pets</strong><br>
      <label><input type="checkbox" name="tipo[]" value="gato"> Gato</label><br>
      <label><input type="checkbox" name="tipo[]" value="cachorro"> Cachorro</label>
    </div>

    <div>
      <strong>Situação</strong><br>
      <label><input type="checkbox" name="situacao[]" value="adotado"> Adotado</label><br>
      <label><input type="checkbox" name="situacao[]" value="para_adocao"> Para adoção</label>
    </div>

    <div>
      <strong>Porte</strong><br>
      <label><input type="checkbox" name="porte[]" value="P"> P</label><br>
      <label><input type="checkbox" name="porte[]" value="M"> M</label><br>
      <label><input type="checkbox" name="porte[]" value="G"> G</label><br>
      <label><input type="checkbox" name="porte[]" value="GG"> GG</label>
    </div>

    <div>
      <strong>Idade</strong><br>
      @include('components.slider')
    </div>
    </div>

    <div class="lista-pets">
    @foreach ($pets as $pet)
    <div class="pet-card">
      <img src="/images/difusor.png" alt="Difusor" class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">
      <div class="info">
      <div class="tags">
      <span class="tag">Adotado</span>
      <span>{{ $pet["sexo"] }} • {{ $pet["idade"] }} anos • Porte {{ $pet["porte"] }}</span>
      </div>
      <h3>{{ $pet["nome"] }}</h3>
      <p>{{ $pet["descricao"] }}</p>
      <div class="extras">
      <span class="badge">Vacinado</span>
      <span class="badge">Castrado</span>
      </div>
      <a href="/pets/1" class="btn">Saiba mais 🐾</a>
      </div>
    </div>
    @endforeach
    </div>
  </div>
@endsection