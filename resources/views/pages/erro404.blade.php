@extends('layouts.default')

@section('title', 'Página Não Encontrada')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/listahome.css') }}">
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh; /* centraliza verticalmente */
            text-align: center;
        }
        .error-container h1 {
            font-size: 6rem;
            color: #FF6B6B;
        }
        .error-container p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .error-container .btn-home {
            background-color: #555086;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .error-container .btn-home:hover {
            background-color: #0066CC;
        }
    </style>
@endsection

@section('content')
<div class="error-container">
    <h1>404</h1>
    <p>Ops! Página não encontrada.</p>
    <a href="{{ url('/') }}" class="btn-home">Voltar para a Home</a>
</div>
@endsection
