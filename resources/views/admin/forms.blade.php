@extends('layouts.adm')

@section('title', 'Formulários de Adoção')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/forms.css') }}">
@endsection

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($forms as $form)
        <div class="caixa">
            <p><strong>Nome:</strong> {{ $form->nome_completo }}</p>
            <p><strong>Status:</strong> {{ ucfirst($form->status) }}</p>
            <a href="{{ route('admin.forms.show', $form->id) }}" class="btn-view">Visualizar</a>
        </div>
    @empty
        <p>Nenhum formulário enviado ainda.</p>
    @endforelse
</div>
@endsection
