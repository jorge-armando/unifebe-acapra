@extends('layouts.adm')

@section('title', 'Adicionar Pet')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/addPet.css') }}">
@endsection

@section('content')
    <div class="form-container">
    <h1>Difusor</h1>

    <label for="tipo">Tipo</label>
    <select id="tipo">
      <option>Gato</option>
      <option>Cachorro</option>
    </select>

    <label for="mostrar">Mostrar no site</label>
    <select id="mostrar">
      <option>Sim</option>
      <option>Não</option>
    </select>

    <label for="nome">Nome</label>
    <input type="text" id="nome" value="Insira o Nome">

    <label for="sexo">Sexo</label>
    <select id="sexo">
      <option>Macho</option>
      <option>Fêmea</option>
    </select>

    <label for="idade">Idade</label>
    <input type="number" id="idade" value="">

    <label for="porte">Porte</label>
    <select id="porte">
      <option>P</option>
      <option>M</option>
      <option>G</option>
    </select>

    <div>
      <label for="detalhes">Detalhes:</label>
      <div class="detalhes-container">
        <label><input type="checkbox" name="detalhes" value="Brincalhão"> Brincalhão</label>
        <label><input type="checkbox" name="detalhes" value="Agressivo"> Agressivo</label>
        <label><input type="checkbox" name="detalhes" value="Sociável"> Sociável</label>
        <label><input type="checkbox" name="detalhes" value="Adestrado"> Adestrado</label>
        <label><input type="checkbox" name="detalhes" value="Medroso"> Medroso</label>
        <label><input type="checkbox" name="detalhes" value="Calmo"> Calmo</label>
        <label><input type="checkbox" name="detalhes" value="Idoso"> Idoso</label>
        <label><input type="checkbox" name="detalhes" value="Filhote"> Filhote</label>
        <label><input type="checkbox" name="detalhes" value="Vacinado"> Vacinado</label>
        <label><input type="checkbox" name="detalhes" value="Castrado"> Castrado</label>
        <label><input type="checkbox" name="detalhes" value="FELV"> FELV +</label>
        <label><input type="checkbox" name="detalhes" value="FIV"> FIV +</label>
        <label><input type="checkbox" name="detalhes" value="Deficiente"> Deficiente Fisíco</label>
        <label><input type="checkbox" name="detalhes" value="Alergias"> Alergias</label>
      </div>
    </div>

    <label for="historia">História</label>
    <textarea id="historia" rows="3" placeholder="Insira aqui as informações..."></textarea>

    <label for="complicacoes">Complicações</label>
    <textarea id="complicacoes" rows="3" placeholder="Insira aqui as informações..."></textarea>

    <label for="descricao">Descrição Completa</label>
    <textarea id="descricao" rows="3" placeholder="Insira aqui as informações..."></textarea>

    <label>Insira aqui as fotos do pet</label>
    <div class="upload-container">
      <img src="https://placekitten.com/100/100" alt="preview">
      <input type="file" />
    </div>

    <div class="submit-btn">
      <button>Salvar 🐾</button>
    </div>
  </div>
@endsection
