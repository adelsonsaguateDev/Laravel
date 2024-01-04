<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventoController extends Controller
{
    public function index(){

      $search = request('search');

      if($search){
          $events = Event::where([
            ['titulo', 'like', '%'.$search.'%']
          ])->get();
      }else{
        $events = Event::all();
     
      }
      
      
      return view('home', ['events' => $events, 'search' => $search]);
    }

    public function evento(){

        $events = Event::all();
     
      
      
      return view('eventos', ['events' => $events]);
    }




    //Metodo para adicionar
    public function create(){
        
       return view('events.create');

    }

    public function store(Request $request){
      $event = new Event;

      $event->titulo = $request->titulo;
      $event->date = $request->date;
      $event->cidade = $request->cidade;
      $event->private = $request->private;
      $event->descricao = $request->descricao;
      $event->items = $request->items;


      //Upload de imagens
      if($request->hasFile('image') && $request->file('image')->isValid()){
       
        $requestImage = $request->image;
        $extension = $requestImage->extension();

        //Atribuindo a path ao nome da imagem
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"));
         
        //Mover a imagem para o servidor
        $requestImage->move(public_path('img/events'), $imageName);

        $event->imagem = $imageName;
      }

      $user = auth()->user();
      $event->user_id = $user->id;

      $event->save();

      return EventoController::evento();
 }

   //Buscando um registro na base de dados

   public function show($id){
     
    $event = Event::FindOrFail($id);

    $user = auth()->user();
    $hasUserJoined = false;

    if($user) {
     
      $userEvents = $user->eventsAsParticipant->toArray();

      foreach ($userEvents as $userEvent) {
        if($userEvent['id'] == $id){
          $hasUserJoined = true;
        }
      }

    }

    $dono_do_evento = User::where('id', $event->user_id)->first()->toArray();

    return view('events.show', ['event' => $event , 'dono_do_evento' => $dono_do_evento, 'hasUserJoined' => $hasUserJoined]);

   }

   public function dashboard() {
    
    $user = auth()->user();

    $events = $user->events;   

    $eventsAsParticipant = $user->eventsAsParticipant;

    return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);

   }

   public function destroy($id){

    Event::findOrFail($id)->delete();

    return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
   }
    
   

   public function edit($id){

    $user = auth()->user();

    $event =  Event::findOrFail($id);

    if($user->id != $event->user_id){
      
    return redirect('/dashboard');

    }

    return view('/events.edit', ['event' => $event]);

   }

   public function update(Request $request){

    Event::findOrFail($request->id)->update($request->all());

    return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
   
  }

  public function joinEvent($id){

    $user = auth()->user(); 
    $user->eventsAsParticipant()->attach($id);
    $event = Event::findOrFail($id);

    return redirect('/dashboard')->with('msg', 'Presença confirmada no evento:: '.$event->titulo);
  
  }
    
  

  public function leaveEvent($id){
  
    $user = auth()->user(); 
    $user->eventsAsParticipant()->detach($id);
    $event = Event::findOrFail($id);

    return redirect('/dashboard')->with('msg', 'Você saiu com sucesso evento: '.$event->titulo);
  
  }
     
   
}
