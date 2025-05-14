@extends('layouts.default')

@section('title', 'Quero adotar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
<div class="retangulo">
  <h1 class="title2" style="text-align: center;">Parabéns</h1>
  <p class="par2" style="text-align: left; margin-top: 10px; margin-left: 20px;">
    Seu formulário foi entregue e logo será analisado, muito em breve retornaremos com uma resposta pelo seu e-mail ou telefone de contato!
  </p>
  <button type="submit" class="submit-button2" style="display: block; margin: 20px auto;">
    Voltar a lista de Pets
  </button>
</div>

@endsection
