@extends('layouts.adm')

@section('title', 'Cadastro')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <form id="login-form" class="form-box" method="POST" action="/cadastroPost">
        <h2>Cadastro</h2>

        <div class="line text">
            <label for="input-fullname">Nome completo</label>
            <div>
                <input type="fullname" class="input-text" name="fullname" id="input-fullname"/>
            </div>
        </div>
        <div class="line text">
            <label for="input-email">E-mail</label>
            <div>
                <input type="email" class="input-text" name="email" id="input-email"/>
            </div>
        </div>
        <div class="line text">
            <label for="input-password">Senha</label>
            <div>
                <input type="password" class="input-text" name="password" id="input-password"/>
            </div>
        </div>
        <div class="actions">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
@endsection