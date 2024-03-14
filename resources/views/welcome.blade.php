@extends('layouts.main')
@section('title', 'Eventos')
@section('content')

        <h1>Olá mundo!</h1>

        @foreach($events as $event) 
          <p>{{$event->text}} -- {{$event->descripition}}</p>

        @endforeach

@endsection