<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <h1> Olá mundo! </h1>

        @if($nome == 'viviane' and $idade == 20)
          <p>O seu nome é {{$nome}}, e voce tem {{$idade}} anos</p>
        @elseif($nome == 'viviane' || $idade == 21)
          <p>Voce tem sim</p>
        @endif

        {{-- Este é um comentario --}}
       
    </body>
</html>
