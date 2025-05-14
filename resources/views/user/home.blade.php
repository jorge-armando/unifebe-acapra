@extends('layouts.default')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/userhome.css') }}">
@endsection

@section('content')
    <h1>Bem-vindo à página inicial!</h1>
      <header>
    <div class="top-bar">
      <div class="logo">🐾 ACAPRA</div>
      <button class="header-btn">🐾 Sou ACAPRA</button>
    </div>
  </header>

  <main>
    <h1>Página institucional</h1>
    <button class="main-btn">Ver lista de pets 🐾</button>
  </main>

@endsection



