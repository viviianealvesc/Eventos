@extends('layouts.main')
@section('title', 'Eventos')
@section('content')

        <h1>Olá mundo!</h1>

        @if($nome == 'viviane' and $idade == 20)
          <p>O seu nome é {{$nome}}, e voce tem {{$idade}} anos</p>
        @elseif($nome == 'viviane' || $idade == 21)
          <p>Voce tem sim</p>
        @endif

        {{-- Este é um comentario --}}

@endsection