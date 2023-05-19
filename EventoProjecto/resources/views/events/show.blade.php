@extends('layouts.main')

@section('title', $event->titulo)


@section('content')

<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="col-md-6">
    <img src="/img/events/{{ $event->imagem }}" class="img-fluid" alt="{{ $event->titulo }}">
    </div> 
    <div class="col-md-6" id="info-container">
        <h1>{{ $event->titulo }}</h1>
        <p class="event-city"> <i class="fa  fa-map-marker"></i> {{ $event->cidade }}</p>
        <p class="event-participants"><i class="fa  fa-user-o"></i> {{ count($event->users)}} Participantes</p>
        <p class="event-owner"> <i class="fa  fa-star"></i> {{ $dono_do_evento['name']}}</p>
          @if (!$hasUserJoined)
          <form action="/events/join/{{ $event->id }}" method="post">
            @csrf
            <a href="/events/join/{{ $event->id }}" 
             class="btn btn-primary" 
             id="event-submit"
             onclick="event.preventDefault();
             this.closest('form').submit();">
             Confirmar Presença
            </a>        
           </form>

          @else
             <p class="already-joined-msg">Você já está participando deste evento.</p> 
          @endif
        <h3>O evento conta com:</h3>
       <ul id="items-list">
        @foreach ($event->items as $item)
         <li><i class="fa  fa-arrow-circle-right"></i><span>{{ $item}}</span></li>   
        @endforeach
       </ul>
      </div>
    <div class="col-md-12" id="description-container">
        <h3>Sobre o evento</h3>
        <p class="event-description">{{ $event->descricao }}</p>
    </div>
   </div>    
</div>


@endsection