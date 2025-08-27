@extends('layouts.default')

@section('title', 'Lista de Pets')

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
          {{-- mostra só a primeira imagem --}}
          @if ($pet->imagens->isNotEmpty())
            <img src="{{ $pet->imagens->first()->path }}" 
                 alt="{{ $pet->raca }}" 
                 class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">
          @else
            <img src="/images/no-image.jpg" 
                 alt="Sem imagem" 
                 class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">
          @endif

          <div class="info">
            <div class="tags">
              <span class="tag">{{ $pet->sexo }}</span>
              <span>{{ $pet->idade }} anos • Porte {{ $pet->porte }}</span>
            </div>
            <h3>{{ $pet->raca }}</h3>
            <p>{{ $pet->descricao }}</p>
            <div class="extras">
              @if($pet->detalhes)
                @foreach(explode(',', $pet->detalhes) as $detalhe)
                  <span class="badge">{{ trim($detalhe) }}</span>
                @endforeach
              @endif
            </div>
            <a href="/pets/{{ $pet->id }}" class="btn">Saiba mais 🐾</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
