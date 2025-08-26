@extends('layouts.default')

@section('title', 'Entrar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <form id="login-form" class="form-box" method="POST" action="/admin/loginPost">
        @csrf
        <h2>Bem-vindo</h2>

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
        <div class="line checkbox">
            <input type="checkbox" name="remember_password" id="remember_password"/>
            <label for="remember_password">Lembrar minha senha</label>
        </div>
        <div class="actions">
            <button type="submit">Entrar</button>
        </div>
    </form>
@endsection