@extends('layouts.main')

@section('title', 'Todos Eventos')

@section('content')

<div id="events-container" class="col-md-12">
    <h2>Todos Eventos</h2>    
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
    </div>
</div>

@endsection