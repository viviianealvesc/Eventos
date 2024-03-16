@extends('layouts.main')
@section('title', 'Eventos')
@section('content')

     <div id="search-container" class="col-md-12">
      <h2>Busque um evento</h2>
      <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procure...">
      </form>
     </div>

     <div id="events-container" class="col-md-12">
      <h2>Proximos eventos</h2>
      <p class="subtitle">Veja os eventos dos proximos dias</p>
      <div id="cards-container" class="row">
        @foreach($events as $event)
          <div class="card col-md-3">
            <img src="/img/evento.png" alt="{{$event->text}}">
            <p class="card-date">10/09/2020</p>
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-participants">x participantes</p>
            <a href="#" class="btn btn-primary">Saber mais  ></a>
          </div>
        @endforeach


      </div>

     </div>

@endsection