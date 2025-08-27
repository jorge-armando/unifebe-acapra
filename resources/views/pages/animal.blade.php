@extends('layouts.default')

@section('title', $pet->nome)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user/animalhome.css') }}">
@endsection

@section('content')
    <div class="container mx-auto p-6">
        <!-- Breadcrumbs -->
        <nav class="text-sm text-gray-600 mb-4">
            <a href="/">Home</a> / <a href="/pets">Lista de pets</a> / <strong>{{ $pet->nome }}</strong>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Imagem principal com botões -->
            <div class="relative w-[400px] h-[400px] mx-auto rounded-lg border border-gray-300 shadow overflow-hidden">
                <img id="mainImage" src="{{ asset('storage/' . $pet->imagens[0]->caminho) }}"
                    class="w-full h-full object-cover" style="width: 500px; height: 500px;" alt="Imagem do pet">

                <!-- Botão anterior -->
                <button onclick="prevImage()"
                    class="absolute top-1/2 left-0 -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-700">
                    ‹
                </button>

                <!-- Botão próximo -->
                <button onclick="nextImage()"
                    class="absolute top-1/2 right-0 -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-700">
                    ›
                </button>
            </div>

            <!-- Infos do pet -->
            <div>
                <h2 class="text-2xl font-bold mb-4">{{ $pet->nome }}</h2>

                <div class="bg-gray-100 p-4 rounded mb-2">
                    <h3 class="font-semibold mb-1">Informações gerais 🧬</h3>
                    <p>Sexo: {{ $pet->sexo }}</p>
                    <p>Idade: {{ $pet->idade }} anos</p>
                    <p>Porte: {{ $pet->porte }}</p>
                </div>

                <div class="bg-gray-100 p-4 rounded mb-2">
                    <h3 class="font-semibold mb-1">Detalhes 🔍</h3>
                    @if(is_array($pet->detalhes))
                        @foreach($pet->detalhes as $detalhe)
                            <span
                                class="inline-block bg-indigo-200 text-indigo-800 px-3 py-1 rounded-full text-xs mr-2 mb-1">{{ $detalhe }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="mb-2">
                    <h3 class="font-semibold mb-1">História 📖</h3>
                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $pet->historia }}</p>
                </div>

                @if($pet->complicacoes)
                    <div class="bg-gray-100 p-4 rounded mb-4">
                        <h3 class="font-semibold mb-1">Complicações ❗</h3>
                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $pet->complicacoes }}</p>
                    </div>
                @endif

                <a href="{{ '/quero-adotar/' . $pet->id }}">
                    <button
                        class="bg-indigo-700 hover:bg-indigo-800 text-white font-semibold px-4 py-2 rounded shadow text-sm">
                        Quero adotar 🐾
                    </button>
                </a>
            </div>
        </div>

        @if($pet->descricao)
            <div class="mt-10">
                <h3 class="text-xl font-bold mb-2">Descrição completa 📝</h3>
                <p class="text-gray-700 leading-relaxed text-sm whitespace-pre-line">{{ $pet->descricao }}</p>
            </div>
        @endif
    </div>

    <!-- Script para alternar imagens -->
    <script>
        let currentIndex = 0;
        const images = [
            @foreach($pet->imagens as $imagem)
                "{{ asset('storage/' . $imagem->caminho) }}",
            @endforeach
            ];

        function updateImage() {
            const img = document.getElementById('mainImage');
            img.src = images[currentIndex];
            img.style.width = "500px";
            img.style.height = "500px";
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            updateImage();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateImage();
        }
    </script>
@endsection