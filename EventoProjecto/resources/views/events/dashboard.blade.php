@extends('layouts.main')

@section('title', 'Meus Eventos')


@section('content')


<div class="col-md-10 offset-md-1 dashboard-title-container">
<h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">

@if(count($events) > 0)


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-responsive-md">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col" id="alinhar">Participantes</th>
            <th scope="col" id="alinhar">Acções</th>
        </tr>
    </thead>
 <tbody>
       
    @foreach ($events as $evento)
      <tr>
           <td scropt="row">{{ $loop->index + 1 }}</td>
           <td><a>{{ $evento->titulo}}</a></td>
           <td id="alinhar">
              @if(count($evento->users) == 0)
                   <p>Sem participante</p>
               @else
                {{count($evento->users)}}
            @endif
        
        </td>
          <td>
             <div class="d-flex">
                <a title="Visualizar" href="/events/{{ $evento->id }}" class="btn btn-info  btn-xs"><i class="fa fa-eye">Ver</i></a>
                <a title="Editar" href="/events/edit/{{ $evento->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil">Editar</i></a>

                <form action="/events/{{ $evento->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button title="Apagar" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash">Apagar</i></button>
                </form>
             </div>
          </td>
     </tr>        
    @endforeach
 </tbody>
</table>
  
 </div>
</div>

@else
<p>Você ainda não tem eventos, <a href="/events/create"> Criar evento</a></p>
@endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
    </div>
    
    <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)
    <table class="table table-responsive-md">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col" id="alinhar">Participantes</th>
                <th scope="col">Acções</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($eventsAsParticipant as $evento)
          <tr>
              <td scropt="row">{{ $loop->index + 1 }}</td>
              <td><a>{{ $evento->titulo}}</a></td>
              <td id="alinhar">{{count($evento->users)}}</td>
              <td>
                    <div class="d-flex">
                      <a title="Visualizar" href="/events/{{ $evento->id }}" class="btn btn-info btn-xs"><i class="fa fa-eye">Ver</i></a>
                       
                        <form action="/events/leave/{{ $evento->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                           
                        <button title="Sair do evento" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-sign-out">Sair</i></button>
                        </form>
                    </div>
                </td>
          </tr>   
        @endforeach
       </tbody>
      </table>
    @else
    <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos eventos</a></p>
    @endif


    </div>
 
@endsection