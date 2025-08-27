@extends('layouts.default')

@section('title', 'Lista de Pets')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/user/listahome.css') }}">
@endsection

@section('content')
  <h2>Lista de pets</h2>

  <div class="container-pets">
    {{-- 🔹 Lateral de filtros --}}
    <div class="filtros">
      <h3>Filtros</h3>

      <form method="GET" action="{{ url('/pets') }}">
        <div style="display:flex; gap:8px; margin-bottom:10px;">
          <button type="submit" class="btn btn-primary">Aplicar filtros</button>
          <a href="{{ url('/pets') }}" class="btn">Resetar filtros</a>
        </div>

        <div class="mt-3">
          <strong>Tipo de pets</strong><br>
          <label>
            <input type="checkbox" name="tipo[]" value="Gato"
              {{ in_array('Gato', request()->get('tipo', [])) ? 'checked' : '' }}>
            Gato
          </label><br>
          <label>
            <input type="checkbox" name="tipo[]" value="Cachorro"
              {{ in_array('Cachorro', request()->get('tipo', [])) ? 'checked' : '' }}>
            Cachorro
          </label>
        </div>

        <div class="mt-3">
          <strong>Porte</strong><br>
          {{-- Use valores que EXISTEM no banco: pequeno / médio / grande --}}
          <label>
            <input type="checkbox" name="porte[]" value="pequeno"
              {{ in_array('pequeno', request()->get('porte', [])) ? 'checked' : '' }}>
            Pequeno
          </label><br>
          <label>
            <input type="checkbox" name="porte[]" value="médio"
              {{ in_array('médio', request()->get('porte', [])) ? 'checked' : '' }}>
            Médio
          </label><br>
          <label>
            <input type="checkbox" name="porte[]" value="grande"
              {{ in_array('grande', request()->get('porte', [])) ? 'checked' : '' }}>
            Grande
          </label>
        </div>

        <div class="mt-3">
          <strong>Idade</strong><br>
          @include('components.slider')
        </div>

        <div style="margin-top: 12px;">
          <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
      </form>
    </div>

    {{-- 🔹 Lista de Pets --}}
    <div class="lista-pets">
      @forelse ($pets as $pet)
        <div class="pet-card">
          @if (!empty($pet->imagem))
           <img src="{{ asset('storage/'.$pet->imagem) }}" alt="{{ $pet->raca }}" 
     class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">

          @else
            <img src="/images/no-image.jpg" alt="Sem imagem" class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">
          @endif

          <div class="info">
            <div class="tags">
              <span>{{ $pet->sexo }} • {{ $pet->idade }} anos • Porte {{ $pet->porte }}</span>
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

            <a href="{{ url('/pets/'.$pet->id) }}" class="btn">Saiba mais 🐾</a>
          </div>
        </div>
      @empty
        <p>Nenhum pet encontrado com os filtros selecionados.</p>
      @endforelse
    </div>
  </div>
@endsection
