@extends('layouts.main')
@section('title', $event->title)
@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h3>{{ $event->title }}</h3>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>  {{ $event->city }}</p>
            <p class="event-participants"><ion-icon name="people-outline"></ion-icon>{{ count($event->users) }} Participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwer['name'] }}</p>
            @if(!$hasUserJoined) <!-- Se o usuario ainda não tiver marcado presença -->
              <form action="/events/join/{{ $event->id }}" method="GET">
                @csrf
                <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault; this.closest('form').submit();">Confirmar presença</a>
              </form>
            @else <!-- Se o usuario já tiver marcado presença -->
              <p class="btn btn-info">Sua presença já foi confirmada</p>
            @endif
            <h3>O evento conta com:</h3>
            <ul id="items-list">
            @foreach($event->items as $item)
            <li><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>
            @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento</h3>
            <p class="event-description">{{ $event->descripition }}</p>
        </div>
    </div>

  </div>




@endsection