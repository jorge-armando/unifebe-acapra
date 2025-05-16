@extends('layouts.default')

@section('title', 'Página Inicial')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/animalhome.css') }}">
@endsection

@section('content')
<div class="container mx-auto p-6">
    <nav class="text-sm text-gray-600 mb-4">
        <a href="/">Home</a> / <a> Lista de pets</a> / <strong>Difusor</strong>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Imagem -->
        <div class="flex items-center justify-center">
        <img src="/images/difusor.png" alt="Difusor" class="rounded-xl border border-gray-300 shadow w-[300px] h-auto">
        </div>

        <!-- Infos -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Difusor</h2>

            <div class="bg-gray-100 p-4 rounded mb-2">
                <h3 class="font-semibold mb-1">Informações gerais 🧬</h3>
                <p>Sexo: Macho</p>
                <p>Idade: 12 anos</p>
                <p>Porte: Pequeno</p>
            </div>

            <div class="bg-gray-100 p-4 rounded mb-2">
                <h3 class="font-semibold mb-1">Detalhes 🔍</h3>
                <span class="inline-block bg-indigo-200 text-indigo-800 px-3 py-1 rounded-full text-xs mr-2 mb-1">Castrado</span>
                <span class="inline-block bg-indigo-200 text-indigo-800 px-3 py-1 rounded-full text-xs mr-2 mb-1">Brincalhão</span>
                <span class="inline-block bg-indigo-200 text-indigo-800 px-3 py-1 rounded-full text-xs mr-2 mb-1">Vacinado</span>
                <span class="inline-block bg-indigo-200 text-indigo-800 px-3 py-1 rounded-full text-xs mr-2 mb-1">FELV+</span>
            </div>

            <div class="mb-2">
                <h3 class="font-semibold mb-1">História</h3>
                <p class="text-sm text-gray-700">
                    Difusor é um gatinho macho, que foi encontrado em uma fábrica de peças automotivas, em estado caquético. Aos poucos foi se recuperando e hoje é um jovem saudável e cheio de amor!
                </p>
            </div>

            <div class="bg-gray-100 p-4 rounded mb-4">
                <h3 class="font-semibold mb-1">Complicações ❗</h3>
                <p class="text-sm text-gray-700">
                    Difusor apresenta FELV+ e requer cuidados especiais, mas está bem assistido e pronto para encontrar um lar.
                </p>
            </div>

            <button class="bg-indigo-700 hover:bg-indigo-800 text-white font-semibold px-4 py-2 rounded shadow text-sm">
                Quero adotar 🐾
            </button>
        </div>
    </div>

    <!-- Descrição completa -->
    <div class="mt-10">
        <h3 class="text-xl font-bold mb-2">Descrição completa 📝</h3>
        <p class="text-gray-700 leading-relaxed text-sm whitespace-pre-line">
Difusor é um gatinho macho, que foi encontrado em uma fábrica de peças automotivas (por isso o nome), chegou em estado caquético, com extrema magreza. 
Aos poucos foi se recuperando e hoje é um jovem 100% saudável e cheio de amor!

Difusor é um doce de gato, muito brincalhão, adora um carinho atrás das orelhas e se dá bem com outros gatos. 
Está vacinado, castrado e testado positivo para FELV, mas está estável, sem sintomas e apto para viver em um lar com amor.

Adote o Difusor e dê uma chance para um gato especial!
        </p>
    </div>
</div>

@endsection
