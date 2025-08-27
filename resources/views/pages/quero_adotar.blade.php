@extends('layouts.default')

@section('title', 'Quero adotar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
    <h1 id="queroAdotar" class="title1">Quero adotar!</h1>

    <div class="page-container">
        <div class="form-container">

            <p class="par2">Se for menor de idade, seus responsáveis devem responder o formulário!</p>

            <form action="/quero-adotar-post" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informações Pessoais -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconUser.png') }}" alt="Imagem pessoa">
                    <span class="title3">Informações Pessoais</span>
                </div>

                <label for="nome_completo" class="par1">Nome completo:</label><br>
                <input type="text" name="nome_completo" required id="nome_completo" class="input-field">

                <label for="data_nasc" class="par1">Data de nascimento:</label><br>
                <input type="date" name="data_nasc" required id="data_nasc" class="input-field">

                <label for="email" class="par1">E-mail para contato:</label><br>
                <input type="email" name="email" required id="email" class="input-field">

                <label for="renda_mensal" class="par1">Qual sua renda mensal?</label><br>
                <input type="text" name="renda_mensal" required id="renda_mensal" class="input-field">

                <label for="casa_ou_apt" class="par1">Você mora em casa ou apartamento?</label><br>
                <input type="text" name="casa_ou_apt" required id="casa_ou_apt" class="input-field">

                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" required name="propriedade" value="proprio"> Próprio
                    </label>
                    <label>
                        <input type="radio" class="radio-btn" required name="propriedade" value="alugado"> Alugado
                    </label>
                </div>
                <br>
                <hr>

                <!-- Endereço -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconLocation.png') }}" alt="Imagem localidade">
                    <span class="title3">Endereço completo</span>
                </div>

                <label for="cep" class="par1">CEP:</label><br>
                <input type="text" name="cep" required id="cep" class="input-field">

                <label for="estado" class="par1">Estado:</label><br>
                <select id="estado" name="estado" required class="input-field">
                    <option value="">Selecione</option>
                    @foreach(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'] as $uf)
                        <option value="{{ $uf }}">{{ $uf }}</option>
                    @endforeach
                </select>

                <label for="cidade" class="par1">Cidade:</label><br>
                <input type="text" name="cidade" required id="cidade" class="input-field">

                <label for="bairro" class="par1">Bairro:</label><br>
                <input type="text" name="bairro" required id="bairro" class="input-field">

                <label for="rua" class="par1">Rua:</label><br>
                <input type="text" name="rua" required id="rua" class="input-field">

                <label for="numero" class="par1">Número:</label><br>
                <input type="text" name="numero" required id="numero" class="input-field">

                <label for="ponto_ref" class="par1">Ponto de referência:</label><br>
                <input type="text" name="ponto_ref" required id="ponto_ref" class="input-field">
                <br>
                <hr>

                <!-- Sobre o animal -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconAnm.png') }}" alt="Imagem localidade">
                    <span class="title3">Sobre seu novo amigo!</span>
                </div>

                <label class="par1">Qual animal você quer adotar?</label><br><br>

                <label>
                    <input type="radio" required class="radio-btn" name="cachorro_ou_gato" value="cachorro" @if(isset($pet) && strtolower(trim($pet->tipo)) === 'cachorro') checked @endif @if(isset($pet)) disabled @endif>
                    Cachorro
                </label>
                <label>
                    <input type="radio" required class="radio-btn" name="cachorro_ou_gato" value="gato" @if(isset($pet) && strtolower(trim($pet->tipo)) === 'gato') checked @endif @if(isset($pet)) disabled @endif> Gato
                </label><br><br>

                @if(isset($pet))
                    <input type="hidden" name="cachorro_ou_gato" value="{{ strtolower(trim($pet->tipo)) }}">
                @endif

                <label for="nome_pet" class="par1">Nome do pet que você quer adotar</label><br>
                <input type="text" name="nome_animal" required id="nome_animal" class="input-field"
                    value="{{ $pet->nome ?? '' }}" @if(isset($pet)) readonly @endif>

                <label for="outros_animais" class="par1">Você tem outros animais? Se sim, quantos e quais?</label><br>
                <input type="text" name="outros_animais" required id="outros_animais" class="input-field">

                <label for="castrados_e_vacinados" class="par1">São castrados e vacinados?</label><br>
                <input type="text" name="castrados_e_vacinados" required id="castrados_e_vacinados" class="input-field">

                <label for="espaco_adequado" class="par1">A sua casa/apto possui um espaço adequado e
                    cercado?</label><br>
                <input type="text" name="espaco_adequado" required id="espaco_adequado" class="input-field">

                <label for="acesso_rua" class="par1">O animal terá acesso à rua?</label><br>
                <input type="text" name="acesso_rua" required id="acesso_rua" class="input-field">

                <label for="qual_local" class="par1">Qual o local em que o animal irá ficar?</label><br>
                <input type="text" name="qual_local" required id="qual_local" class="input-field">

                <label for="tem_telas" class="par1">A sua residência tem telas?</label><br>
                <input type="text" name="tem_telas" required id="tem_telas" class="input-field">

                <label for="gato_acesso_rua" class="par1">Você deixaria o gato ter acesso à rua?</label><br>
                <input type="text" name="gato_acesso_rua" required id="gato_acesso_rua" class="input-field">
                <br>
                <hr>

                <!-- Documentação -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconDoc.png') }}" alt="Imagem documentação">
                    <span class="title3">Envio de documentação</span>
                </div>

                <label for="doc_identidade" class="par1bold">Carteira de identidade</label><br>
                <input type="file" name="doc_identidade" id="doc_identidade"><br><br>

                <label for="foto_local" class="par1bold">Foto do local onde o animal irá ficar</label><br>
                <input type="file" name="foto_local" id="foto_local"><br><br>

                <label for="foto_outros_animais" class="par1bold">Se tiver outros animais, foto dos mesmos e das suas
                    carteiras de vacinação</label><br>
                <input type="file" name="foto_outros_animais" id="foto_outros_animais"><br><br>

                <label for="foto_telas" class="par1bold">Foto das telas</label><br>
                <input type="file" name="foto_telas" id="foto_telas"><br><br>
                <hr>

                <!-- Termos e condições -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconTerms.png') }}" alt="Imagem termos e condições">
                    <span class="title3">Termos e condições</span>
                </div>

                <label class="par1">Você tem condições físicas, mentais e financeiras de manter um
                    animal?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" required name="condicoes_fisicas" value="sim"> Sim
                    </label>
                    <label>
                        <input type="radio" required name="condicoes_fisicas" value="nao"> Não
                    </label>
                </div><br>

                <label class="par1">A castração e vacinação do animal é OBRIGATÓRIA, você concorda com
                    isso?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" required name="castracao_vacinacao" value="sim"> Sim
                    </label>
                    <label>
                        <input type="radio" required name="castracao_vacinacao" value="nao"> Não
                    </label>
                </div><br>

                <label class="par1">Existe uma taxa de adoção colaborativa de R$30,00. Você concorda em
                    contribuir?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" required name="adocao_colaborativa" value="sim"> Sim
                    </label>
                    <label>
                        <input type="radio" required name="adocao_colaborativa" value="nao"> Não
                    </label>
                </div><br>

                <button type="submit" class="submit-button">Enviar</button>

            </form>
        </div>
    </div>
@endsection