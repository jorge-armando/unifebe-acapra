@extends('layouts.default')

@section('title', 'Adotar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<!-- Título principal da página -->
    <h1 id="queroAdotar" class="title1">Quero adotar!</h1>

    <!-- Contêiner principal da página -->
    <div class="page-container">

        <!-- Contêiner do formulário -->
        <div class="form-container">

            <!-- Aviso sobre menores de idade -->
            <p class="par2">Se for menor de idade, seus responsáveis devem responder o formulário!</p>

            <!-- Início do formulário -->
            <form action="" method="POST">

                <!-- Seção: Informações Pessoais -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconUser.png') }}" alt="Imagem pessoa">
                    <span class="title3">Informações Pessoais</span>
                </div>

                <!-- Campos de entrada de dados pessoais -->
                <span class="par1">Nome completo:</span><br>
                <input type="text" id="nome_completo" class="input-field">

                <span class="par1">Data de nascimento:</span><br>
                <input type="date" id="data_nasc" class="input-field">

                <span class="par1">E-mail para contato:</span><br>
                <input type="text" id="email" class="input-field">

                <span class="par1">Qual sua renda mensal?</span><br>
                <input type="text" id="renda_mensal" class="input-field">

                <span class="par1">Você mora em casa ou apartamento?</span><br>
                <input type="text" id="casa_ou_apt" class="input-field">

                
                <!-- Tipo de propriedade -->
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="propriedade" value="proprio"> Próprio
                    </label>
                    <label>
                        <input type="radio" class="radio-btn" name="propriedade" value="alugado"> Alugado
                    </label>
                </div>
                <br>
                <hr>

                <!-- Seção: Endereço -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconLocation.png') }}" alt="Imagem localidade">
                    <span class="title3">Endereço completo</span>
                </div>

                <!-- Campos de endereço -->
                <span class="par1">CEP:</span><br>
                <input type="text" id="cep" class="input-field">

                <span class="par1">Estado:</span><br>
                <input type="text" id="estado" class="input-field">

                <span class="par1">Cidade:</span><br>
                <input type="text" id="cidade" class="input-field">

                <span class="par1">Bairro:</span><br>
                <input type="text" id="bairro" class="input-field">

                <span class="par1">Rua:</span><br>
                <input type="text" id="rua" class="input-field">

                <span class="par1">Número:</span><br>
                <input type="text" id="numero" class="input-field">

                <span class="par1">Ponto de referência:</span><br>
                <input type="text" id="ponto_ref" class="input-field">
                <br>
                <hr>

                <!-- Seção: Informações sobre o animal -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconAnm.png') }}" alt="Imagem localidade">
                    <span class="title3">Sobre seu novo amigo!</span>
                </div>

                <!-- Escolha do tipo de animal -->
                <span class="par1">Qual animal você quer adotar?</span><br><br>
                <label>
                    <input type="radio" class="radio-btn" name="cachorro_ou_gato" value="cachorro"> Cachorro
                </label>
                <label>
                    <input type="radio" class="radio-btn" name="cachorro_ou_gato" value="gato"> Gato
                </label><br><br>

                <!-- Informações sobre o animal desejado -->
                <span class="par1">Qual o nome do animal você tem interesse em adotar:</span><br>
                <input type="text" id="nome_animal" class="input-field">

                <span class="par1">Você tem outros animais? Se sim, quantos e quais?</span><br>
                <input type="text" id="outros_nimais" class="input-field">

                <span class="par1">São castrados e vacinados?</span><br>
                <input type="text" id="castrados_e_vacinados" class="input-field">

                <!-- Perguntas específicas para cachorro -->
                <span class="par1">A sua casa/apto possui um espaço adequado e cercado?</span><br>
                <input type="text" id="espaco_adequado" class="input-field">

                <span class="par1">O animal terá acesso à rua?</span><br>
                <input type="text" id="acesso_rua" class="input-field">

                <span class="par1">Qual o local em que o animal irá ficar?</span><br>
                <input type="text" id="qual_local" class="input-field">

                <!-- Perguntas específicas para gato -->
                <span class="par1">A sua residência tem telas?</span><br>
                <input type="text" id="tem_telas" class="input-field">

                <span class="par1">Você deixaria o gato ter acesso à rua? Dar "voltinhas"?</span><br>
                <input type="text" id="acesso_rua" class="input-field">
                <br>
                <hr>


                <!-- Seção: Envio de documentação -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconDoc.png') }}" alt="Imagem documentação">
                    <span class="title3">Envio de documentação</span>
                </div>


                <span class="par1bold">Carteira de identidade</span><br>
                <input type="file" id="uploadFoto" name="carteira_identidade" class="input-file" accept="image/*"><br><br>

                <span class="par1bold">Foto do local onde o animal irá ficar (terreno, casa, canil...)</span><br>
                <input type="file" id="uploadFoto" name="foto_local" class="input-file" accept="image/*"><br><br>

                <span class="par1bold">Se tiver outros animais, foto dos mesmos e das suas carteiras de
                    vacinação</span><br>
                <input type="file" id="uploadFoto" name="carteira_vacinacao_animais" class="input-file" accept="image/*"><br><br>

                <!-- Imagem apenas para gato -->
                <span class="par1bold">Foto das telas</span><br>
                <input type="file" id="uploadFoto" name="foto_telas" class="input-file" accept="image/*">

                <br>
                <hr>

                <!-- Seção: Termos e condições -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconTerms.png') }}" alt="Imagem termos e condições">
                    <span class="title3">Termos e condições</span>
                </div>

                <!-- Compromissos com o bem-estar do animal -->
                <span class="par1">Você tem condições físicas, mentais e financeiras de manter um animal? Uma boa ração?
                    Visitas ao veterinário? Castração? Passeios?</span><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="condicoes_fisicas" value="sim"> Sim, eu tenho
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="condicoes_fisicas" value="nao"> Não, não tenho
                    </label><br><br><br>
                </div>

                <!-- Concordância com castração -->
                <span class="par1">A castração e vacinação do animal é OBRIGATÓRIA, você concorda com
                    isso?</span><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="castracao_vacinacao" value="sim"> Sim, concordo
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="castracao_vacinacao" value="nao"> Não, discordo
                    </label><br><br><br>
                </div>

                <!-- Contribuição financeira -->
                <span class="par1">Existe uma taxa de adoção colaborativa de R$30,00. Você concorda em
                    contribuir?</span><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="adocao_colaborativa" value="sim"> Sim, concordo
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="adocao_colaborativa" value="nao"> Não, discordo
                    </label><br><br><br>
                </div>

                <!-- Concordância dos responsáveis -->
                <span class="par1">Se for menor de idade, todos os responsáveis concordam?</span><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="responsaveis_concordam" value="sim"> Sim, todos concordam!
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="responsaveis_concordam" value="nao"> Não, não estão de
                        acordo
                    </label>
                </div><br><br>
                <button type="submit" class="submit-btn">Enviar</button>

            </form>
        </div>
    </div>

@endsection




    