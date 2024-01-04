@extends('layouts.main')

@section('title', 'Criar Evento')


@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12 form-group">
        <label for="image">Imagem do Evento:</label>
        <input type="file" class="from-control-file" id="image" name="image" accept="image/*">   
      </div>
      <div class="form-group col-12">
        <img src="" alt="" class="img-preview">
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
          <label for="title">Evento:</label>
          <input type="text" class="form-control" id="title" name="titulo" placeholder="Nome do evento">   
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <label for="date">Data do evento:</label>
        <input type="date" class="form-control" id="date" name="date">   
      </div>
      <div class="col-md-6 form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="cidade" placeholder="Local do evento">   
      </div>
    </div>
      
    <div class="row">
      <div class="col-md-12 form-group">
          <label for="title">O evento é privado?</label>
          <select name="private" id="private" class="form-control">
              <option value="0">Não</option>
              <option value="1">Sim</option>
          </select>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
          <label for="title">Descrição:</label>
          <textarea name="descricao" id="description"  class="form-control" placeholder="O que vai acontecer no evento?"></textarea>   
        </div>
        <div class="col-md-12 form-group">
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
    </div>
      
      <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection