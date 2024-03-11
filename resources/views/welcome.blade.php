<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <h1>Olá mundo!</h1>

        @if($nome == 'viviane' and $idade == 20)
          <p>O seu nome é {{$nome}}, e voce tem {{$idade}} anos</p>
        @elseif($nome == 'viviane' || $idade == 21)
          <p>Voce tem sim</p>
        @endif

        {{-- Este é um comentario --}}
       
    </body>
</html>
