@extends('layouts.adm')

@section('title', 'Análise de Formulário')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
    <h1 id="queroAdotar" class="title1">Análise de Formulário</h1>

    <div class="page-container">
        <div class="form-container">

            <!-- Mensagem de sucesso -->
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <!-- Exibindo dados do formulário -->
            <form action="{{ route('adocao.updateStatus', $adocao->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informações Pessoais -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconUser.png') }}" alt="Imagem pessoa">
                    <span class="title3">Informações Pessoais</span>
                </div>

                <label class="par1">Nome completo:</label><br>
                <input type="text" value="{{ $adocao->nome_completo }}" class="input-field" readonly>

                <label class="par1">Data de nascimento:</label><br>
                <input type="date" value="{{ $adocao->data_nasc }}" class="input-field" readonly>

                <label class="par1">E-mail para contato:</label><br>
                <input type="email" value="{{ $adocao->email }}" class="input-field" readonly>

                <label class="par1">Renda mensal:</label><br>
                <input type="text" value="{{ $adocao->renda_mensal }}" class="input-field" readonly>

                <label class="par1">Você mora em casa ou apartamento?</label><br>
                <input type="text" value="{{ $adocao->casa_ou_apt }}" class="input-field" readonly>

                <label class="par1">Propriedade:</label><br>
                <input type="text" value="{{ $adocao->propriedade }}" class="input-field" readonly>
                <hr>

                <!-- Endereço -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconLocation.png') }}" alt="Imagem localidade">
                    <span class="title3">Endereço completo</span>
                </div>

                <label class="par1">CEP:</label><br>
                <input type="text" value="{{ $adocao->cep }}" class="input-field" readonly>

                <label class="par1">Estado:</label><br>
                <input type="text" value="{{ $adocao->estado }}" class="input-field" readonly>

                <label class="par1">Cidade:</label><br>
                <input type="text" value="{{ $adocao->cidade }}" class="input-field" readonly>

                <label class="par1">Bairro:</label><br>
                <input type="text" value="{{ $adocao->bairro }}" class="input-field" readonly>

                <label class="par1">Rua:</label><br>
                <input type="text" value="{{ $adocao->rua }}" class="input-field" readonly>

                <label class="par1">Número:</label><br>
                <input type="text" value="{{ $adocao->numero }}" class="input-field" readonly>

                <label class="par1">Referência:</label><br>
                <input type="text" value="{{ $adocao->ponto_ref }}" class="input-field" readonly>


                <!-- Informações sobre o animal -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconAnm.png') }}" alt="Imagem animal">
                    <span class="title3">Sobre seu novo amigo!</span>
                </div>

                <label class="par1">Tipo de animal:</label><br>
                <input type="text" value="{{ $adocao->cachorro_ou_gato }}" class="input-field" readonly>

                <label class="par1">Nome do animal:</label><br>
                <input type="text" value="{{ $adocao->nome_animal }}" class="input-field" readonly>

                <label class="par1">Outros animais:</label><br>
                <input type="text" value="{{ $adocao->outros_animais }}" class="input-field" readonly>

                <label class="par1">Castrados e vacinados:</label><br>
                <input type="text" value="{{ $adocao->castrados_e_vacinados }}" class="input-field" readonly>

                <label class="par1">Espaço adequado:</label><br>
                <input type="text" value="{{ $adocao->espaco_adequado }}" class="input-field" readonly>

                <label class="par1">Acesso à rua:</label><br>
                <input type="text" value="{{ $adocao->acesso_rua }}" class="input-field" readonly>

                <label class="par1">Local onde ficará:</label><br>
                <input type="text" value="{{ $adocao->qual_local }}" class="input-field" readonly>

                <label class="par1">Residência com telas:</label><br>
                <input type="text" value="{{ $adocao->tem_telas }}" class="input-field" readonly>

                <label class="par1">Gato acesso rua:</label><br>
                <input type="text" value="{{ $adocao->gato_acesso_rua }}" class="input-field" readonly>
                <hr>

                <!-- Documentos -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconDoc.png') }}" alt="Imagem documentação">
                    <span class="title3">Documentação</span>
                </div>

                <p>Carteira de identidade: <a href="{{ asset('storage/' . $adocao->doc_identidade) }}" target="_blank">Ver
                        arquivo</a></p>
                <p>Foto do local: <a href="{{ asset('storage/' . $adocao->foto_local) }}" target="_blank">Ver arquivo</a>
                </p>
                <p>Foto de outros animais/vacinação: <a href="{{ asset('storage/' . $adocao->foto_outros_animais) }}"
                        target="_blank">Ver arquivo</a></p>
                <p>Foto das telas: <a href="{{ asset('storage/' . $adocao->foto_telas) }}" target="_blank">Ver arquivo</a>
                </p>
                <hr>

                <!-- Termos e condições -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconTerms.png') }}" alt="Imagem termos">
                    <span class="title3">Termos e condições</span>
                </div>

                <label class="par1">Condições físicas:</label><br>
                <input type="text" value="{{ $adocao->condicoes_fisicas }}" class="input-field" readonly>

                <label class="par1">Castração e vacinação:</label><br>
                <input type="text" value="{{ $adocao->castracao_vacinacao }}" class="input-field" readonly>

                <label class="par1">Taxa de adoção colaborativa:</label><br>
                <input type="text" value="{{ $adocao->adocao_colaborativa }}" class="input-field" readonly>

                <!-- Botões de status -->
                <div class="btn-group">
                    <button type="submit" name="status" value="aprovado" class="submit-button">Aprovar</button>
                    <button type="submit" name="status" value="reprovado" class="submit-button">Reprovar</button>
                </div>
            </form>
        </div>
    </div>
@endsection