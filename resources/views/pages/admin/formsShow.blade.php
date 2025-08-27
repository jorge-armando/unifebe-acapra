@extends('layouts.adm')

@section('title', 'Formulário de Adoção')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
<h1 class="title1">Formulário de {{ $form->nome_completo }}</h1>

<div class="page-container">
    <div class="form-container">

        <!-- Informações Pessoais -->
        <div class="info-container">
            <img id="iconUser" src="{{ asset('images/iconUser.png') }}" alt="Imagem pessoa">
            <span class="title3">Informações Pessoais</span>
        </div>

        <p class="par1"><strong>Nome completo:</strong> {{ $form->nome_completo }}</p>
        <p class="par1"><strong>Data de nascimento:</strong> {{ $form->data_nasc }}</p>
        <p class="par1"><strong>E-mail:</strong> {{ $form->email }}</p>
        <p class="par1"><strong>Renda mensal:</strong> {{ $form->renda_mensal }}</p>
        <p class="par1"><strong>Casa ou apartamento:</strong> {{ $form->casa_ou_apt }} ({{ $form->propriedade }})</p>
        <hr>

        <!-- Endereço -->
        <div class="info-container">
            <img id="iconUser" src="{{ asset('images/iconLocation.png') }}" alt="Imagem localidade">
            <span class="title3">Endereço completo</span>
        </div>

        <p class="par1"><strong>CEP:</strong> {{ $form->cep }}</p>
        <p class="par1"><strong>Endereço:</strong> {{ $form->rua }}, {{ $form->numero }}, {{ $form->bairro }}, {{ $form->cidade }} - {{ $form->estado }}</p>
        <p class="par1"><strong>Ponto de referência:</strong> {{ $form->ponto_ref }}</p>
        <hr>

        <!-- Sobre o animal -->
        <div class="info-container">
            <img id="iconUser" src="{{ asset('images/iconAnm.png') }}" alt="Imagem animal">
            <span class="title3">Sobre o animal</span>
        </div>

        <p class="par1"><strong>Animal desejado:</strong> {{ $form->nome_animal }} ({{ $form->cachorro_ou_gato }})</p>
        <p class="par1"><strong>Outros animais:</strong> {{ $form->outros_animais }}</p>
        <p class="par1"><strong>Castrados e vacinados:</strong> {{ $form->castrados_e_vacinados }}</p>
        <p class="par1"><strong>Espaço adequado:</strong> {{ $form->espaco_adequado }}</p>
        <p class="par1"><strong>Acesso à rua:</strong> {{ $form->acesso_rua }}</p>
        <p class="par1"><strong>Local onde ficará o animal:</strong> {{ $form->qual_local }}</p>
        <p class="par1"><strong>Possui telas:</strong> {{ $form->tem_telas }}</p>
        <p class="par1"><strong>Gato teria acesso à rua:</strong> {{ $form->gato_acesso_rua }}</p>
        <hr>

        <!-- Documentação -->
        <div class="info-container">
            <img id="iconUser" src="{{ asset('images/iconDoc.png') }}" alt="Imagem documentação">
            <span class="title3">Documentação enviada</span>
        </div>

        @if($form->doc_identidade)
            <p class="par1"><a href="{{ asset('storage/' . $form->doc_identidade) }}" target="_blank">Carteira de identidade</a></p>
        @endif
        @if($form->foto_local)
            <p class="par1"><a href="{{ asset('storage/' . $form->foto_local) }}" target="_blank">Foto do local</a></p>
        @endif
        @if($form->foto_outros_animais)
            <p class="par1"><a href="{{ asset('storage/' . $form->foto_outros_animais) }}" target="_blank">Fotos de outros animais</a></p>
        @endif
        @if($form->foto_telas)
            <p class="par1"><a href="{{ asset('storage/' . $form->foto_telas) }}" target="_blank">Fotos das telas</a></p>
        @endif
        <hr>

        <!-- Termos -->
        <div class="info-container">
            <img id="iconUser" src="{{ asset('images/iconTerms.png') }}" alt="Imagem termos">
            <span class="title3">Termos e condições</span>
        </div>

        <p class="par1"><strong>Condições físicas, mentais e financeiras:</strong> {{ $form->condicoes_fisicas }}</p>
        <p class="par1"><strong>Concorda com castração e vacinação:</strong> {{ $form->castracao_vacinacao }}</p>
        <p class="par1"><strong>Concorda com taxa colaborativa:</strong> {{ $form->adocao_colaborativa }}</p>
        <hr>

        <!-- Botões -->
        <div class="btn-container">
            <a href="{{ route('admin.forms.aprovar', $form->id) }}" class="submit-button">Aprovar</a>
            <a href="{{ route('admin.forms.reprovar', $form->id) }}" class="submit-button btn-reject">Reprovar</a>
            <a href="{{ route('admin.forms') }}" class="submit-button btn-back">Voltar</a>
        </div>

    </div>
</div>
@endsection
