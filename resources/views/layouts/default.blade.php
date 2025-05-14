<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'Acapra')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/10-reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/20-tokens.css') }}">
        <link rel="stylesheet" href="{{ asset('css/30-fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/40-base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layouts/default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        @yield('styles')

        <!-- Scripts -->
        @yield('scripts')
    </head>
    <body>
        @include('components.header')
        <main>
            @yield('content')
        </main>
         @include('components.footer')
    </body>
</html>
