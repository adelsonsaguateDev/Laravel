@extends('layouts.main')

@section('title', 'Eventos do Dia')

@section('content')

<div id="search-container" class="cod-md-12">

    <h1>Pesquise um evento</h1>
    <form action="/" method="GET">
        <div class="row">
            <div class="col-md-10">
                <input type="text"  id="search" name="search" class="form-control" placeholder="Pesquise aqui..." >                
            </div>
            <div class="">
                <input class="form-control" style="background-color: white" class="btn btn-warning" type="submit" value="Pesquisar">
            </div>
        </div>
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Pesquisou por: {{ $search }}</h2>
    @else
    <h2>Proximos Eventos</h2>    
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">

    @foreach($events as $event)
     <div class="card col-md-3">
    <img src="/img/events/{{ $event->imagem }}" alt="{{ $event->titulo}}">
        <div class="card-body">
            <p class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</p>
            <h5 class="card-title">{{ $event->titulo}}</h5>
            <p class="card-participants"> {{ count($event->users)}} participantes</p>
            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
          </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <p>Não foi possível encontrar um evento com o titulo: {{ $search }} <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
        <p>Não há eventos disponíveis.</p>
        @endif
    </div>
</div>

@endsection