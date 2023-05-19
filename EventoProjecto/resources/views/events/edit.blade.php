@extends('layouts.main')

@section('title', 'Editando: '. $event->titulo)


@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->titulo}}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem do Evento:</label>
      <input type="file" class="from-control-file" id="image" name="image"> 
      <div id="image-container-edit">
      <img src="/img/events/{{ $event->imagem }} " alt="{{ $event->titulo}}" class="img-preview">
      </div>
    </div>
      <div class="form-group">
        <label for="titulo">Evento:</label>
        <input type="text" class="form-control" id="title" name="titulo" placeholder="Nome do evento" value="{{ $event->titulo }}">   
      </div>
      <div class="form-group">
        <label for="date">Data do evento:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">   
      </div>
      
      <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="cidade" placeholder="Local do evento" value="{{ $event->cidade }}" >   
      </div>
      <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="private" id="private" class="form-control">
             <option value="0">Não</option>
             <option value="1" {{ $event->private == 1 ? "selected = 'selected'" : ""}}>Sim</option>
        </select>
    </div>
      <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="descricao" id="description"  class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->descricao }}</textarea>   
      </div>
      <div class="form-group">
        <label for="title">Adicione itens de infrestrutura:</label>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Comida Gratis"> Comida Gratis
        </div>
        <div class="form-group">
          <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>
       
        
      
      </div>
      
      <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection