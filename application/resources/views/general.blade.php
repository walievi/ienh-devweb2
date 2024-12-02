<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>{{ config('app.name', 'Minha Aplicação') }}</title>
    </head>
    <body class="bg-light">
        <div class="container py-5">
            @yield('content')
        </div>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
