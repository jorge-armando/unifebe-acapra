@extends('layouts.default')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/userhome.css') }}">
@endsection

@section('content')
  <main>
    <h1>Página institucional</h1>
<a href="/pets" class="main-btn">Ver lista de pets 🐾</a>
  </main>
@endsection



