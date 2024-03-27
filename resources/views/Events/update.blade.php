@extends('layouts.main')
@section('title', 'Evento')
@section('content')

    <div id="event-create-container" class="col-md-6 0ffset-md-3">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $event->id }}">
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <!-- Exibir a imagem atual -->
                <input type="file" id="image" name="image" class="form-control-file">
                <img class="img-preview" src="/img/events/{{ $event->image }}" alt="Imagem Atual">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d', strtotime($event->date)) }}">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
               <select name="private" id="private" name="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
               </select>
            </div>
            <div class="form-group">
                <label for="descripition">Descrição:</label>
               <textarea id="descripition" name="descripition" class="form-control">{{ $event->descripition }}</textarea>
            </div>
            <div class="form-group">
                <label for="items">Adicione items de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" checked name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]"  value="Brindes"> Brindes
                </div>
            </div>

            <input type="submit" class="btn btn-primary botao" value="Editar evento">
        </form>
    </div>


@endsection