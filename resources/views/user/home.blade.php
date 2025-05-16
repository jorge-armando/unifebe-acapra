@extends('layouts.default')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/userhome.css') }}">
@endsection

@section('content')
  

  <main>
    <h1>Página institucional</h1>
    <button class="main-btn">Ver lista de pets 🐾</button>
  </main>

@endsection



