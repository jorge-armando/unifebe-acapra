@extends('layouts.adm')

@section('title', 'Análise de Formulário')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
    <!-- Título principal da página -->
    <h1 id="queroAdotar" class="title1">Análise de Formulário</h1>

    <!-- Contêiner principal da página -->
    <div class="page-container">

        <!-- Contêiner do formulário -->
        <div class="form-container">

            <!-- Início do formulário -->
            <form action="" method="POST">

                <!-- Seção: Informações Pessoais -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconUser.png') }}" alt="Imagem pessoa">
                    <span class="title3">Informações Pessoais</span>
                </div>

                <!-- Campos de entrada de dados pessoais -->
                <label for="nome_completo" class="par1">Nome completo:</label><br>
                <input type="text" value="Teste da silva" class="input-field" >

                <label for="data_nasc" class="par1">Data de nascimento:</label><br>
                <input type="date" id="data_nasc" class="input-field">

                <label for="email" class="par1">E-mail para contato:</label><br>
                <input type="email" id="email" value="teste@gm.com" class="input-field">

                <label for="renda_mensal" class="par1">Qual sua renda mensal?</label><br>
                <input type="text" id="renda_mensal" value="1900,00" class="input-field">

                <label for="casa_ou_apt" class="par1">Você mora em casa ou apartamento?</label><br>
                <input type="text" id="casa_ou_apt" value="casa" class="input-field">

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
                <label for="cep" class="par1">CEP:</label><br>
                <input type="text" id="cep" value="88295-000" class="input-field">

                <label for="estado" class="par1">Estado:</label><br>
                <select id="estado" name="estado" class="input-field">
                    <option value="">Selecione</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>

                <label for="cidade" class="par1">Cidade:</label><br>
                <input type="text" id="cidade" value="Botuverá" class="input-field">

                <label for="bairro" class="par1">Bairro:</label><br>
                <input type="text" id="bairro" value="Pedras Grandes" class="input-field">

                <label for="rua" class="par1">Rua:</label><br>
                <input type="text" id="rua" value="PG03" class="input-field">

                <label for="numero" class="par1">Número:</label><br>
                <input type="text" id="numero" value="67" class="input-field">

                <label for="ponto_ref" class="par1">Ponto de referência:</label><br>
                <input type="text" id="ponto_ref" value="abc" class="input-field">
                <br>
                <hr>

                <!-- Seção: Informações sobre o animal -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconAnm.png') }}" alt="Imagem localidade">
                    <span class="title3">Sobre seu novo amigo!</span>
                </div>

                <!-- Escolha do tipo de animal -->
                <label class="par1">Qual animal você quer adotar?</label><br><br>
                <label>
                    <input type="radio" class="radio-btn" name="cachorro_ou_gato" value="cachorro"> Cachorro
                </label>
                <label>
                    <input type="radio" class="radio-btn" name="cachorro_ou_gato" value="gato"> Gato
                </label><br><br>

                <label for="nome_animal" class="par1">Qual o nome do animal você tem interesse em adotar:</label><br>
                <input type="text" id="nome_animal" value="Difusor" class="input-field">

                <label for="outros_nimais" class="par1">Você tem outros animais? Se sim, quantos e quais?</label><br>
                <input type="text" id="outros_nimais" value="Não" class="input-field">

                <label for="castrados_e_vacinados" class="par1">São castrados e vacinados?</label><br>
                <input type="text" id="castrados_e_vacinados" value="Sim" class="input-field">

                <!-- Perguntas específicas para cachorro -->
                <label for="espaco_adequado" class="par1">A sua casa/apto possui um espaço adequado e cercado?</label><br>
                <input type="text" id="espaco_adequado" value="Sim" class="input-field">

                <label for="acesso_rua" class="par1">O animal terá acesso à rua?</label><br>
                <input type="text" id="acesso_rua" value="Não" class="input-field">

                <label for="qual_local" class="par1">Qual o local em que o animal irá ficar?</label><br>
                <input type="text" id="qual_local" value="Jardim" class="input-field">

                <!-- Perguntas específicas para gato -->
                <label for="tem_telas" class="par1">A sua residência tem telas?</label><br>
                <input type="text" id="tem_telas" value="Sim" class="input-field">

                <label for="acesso_rua" class="par1">Você deixaria o gato ter acesso à rua? Dar "voltinhas"?</label><br>
                <input type="text" id="acesso_rua" value="Não,apenas no jardim" class="input-field">
                <br>
                <hr>

                <!-- Seção: Envio de documentação -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconDoc.png') }}" alt="Imagem documentação">
                    <span class="title3">Envio de documentação</span>
                </div>

                <label for="uploadFoto" class="par1bold">Carteira de identidade</label><br>
                <input type="file" id="uploadFoto" name="carteira_identidade" class="input-file" accept="image/*"><br><br>

                <label for="uploadFoto" class="par1bold">Foto do local onde o animal irá ficar (terreno, casa, canil...)</label><br>
                <input type="file" id="uploadFoto" name="foto_local" class="input-file" accept="image/*"><br><br>

                <label for="uploadFoto" class="par1bold">Se tiver outros animais, foto dos mesmos e das suas carteiras de vacinação</label><br>
                <input type="file" id="uploadFoto" name="carteira_vacinacao_animais" class="input-file" accept="image/*"><br><br>

                <!-- Imagem apenas para gato -->
                <label for="uploadFoto" class="par1bold">Foto das telas</label><br>
                <input type="file" id="uploadFoto" name="foto_telas" class="input-file" accept="image/*">

                <br>
                <hr>

                <!-- Seção: Termos e condições -->
                <div class="info-container">
                    <img id="iconUser" src="{{ asset('images/iconTerms.png') }}" alt="Imagem termos e condições">
                    <span class="title3">Termos e condições</span>
                </div>

                <!-- Compromissos com o bem-estar do animal -->
                <label class="par1">Você tem condições físicas, mentais e financeiras de manter um animal? Uma boa ração? Visitas ao veterinário? Castração? Passeios?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="condicoes_fisicas" value="sim"> Sim, eu tenho
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="condicoes_fisicas" value="nao"> Não, não tenho
                    </label><br><br><br>
                </div>

                <!-- Concordância com castração -->
                <label class="par1">A castração e vacinação do animal é OBRIGATÓRIA, você concorda com isso?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="castracao_vacinacao" value="sim"> Sim, concordo
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="castracao_vacinacao" value="nao"> Não, discordo
                    </label><br><br><br>
                </div>

                <!-- Contribuição financeira -->
                <label class="par1">Existe uma taxa de adoção colaborativa de R$30,00. Você concorda em contribuir?</label><br><br>
                <div class="radio-container">
                    <label>
                        <input type="radio" class="radio-btn" name="adocao_colaborativa" value="sim"> Sim, concordo
                    </label><br><br>
                    <label>
                        <input type="radio" class="radio-btn" name="adocao_colaborativa" value="nao"> Não, discordo
                    </label><br><br><br>
                </div>

                <div class="btn-group">
                    <button class="submit-button">Aprovar</button>
                    <button class="submit-button">Reprovar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
