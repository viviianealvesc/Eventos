@extends('layouts.main')
@section('title', 'Eventos')
@section('content')

     <div id="search-container" class="col-md-12">
      <h2>Busque um evento</h2>
      <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procure...">
        <button class="btn btn-primary" type="submit"><ion-icon name="search-outline"></ion-icon></button>
      </form>
     </div>

     <div id="events-container" class="col-md-12">
      @if($search) <!-- Se houver uma busca -->
        <h2>Buscando por: {{ $search }}</h2>
      @else
      <h2>Proximos eventos</h2>
      <p class="subtitle">Veja os eventos dos proximos dias</p>
      @endif
      <div id="cards-container" class="row">
        @foreach($events as $event)
          <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{$event->text}}">
            <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-participants">{{ count($event->users) }} participantes</p>
            <a href="events/{{$event->id}}" class="btn btn-primary btn-card">Saber mais  ></a>
          </div>
        @endforeach

        @if(count($events) == 0 && $search)

          <p>Não foi possivel encontrar nenhum {{ $search }}! <a href="/">Ver todos</a></p>
          
        @elseif(count($events) == 0)

          <p>Não há eventos disponiveis</p>

        @endif
      </div>
     </div>

@endsection