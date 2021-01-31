<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;



class EventController extends Controller
{
   
    //===================================
    //View Index, retonar todos os valores
    public function index() {

      $search = request('search');

      if($search) {

         $events = Event::where([
            ['title', 'like', '%'.$search.'%']
         ])->get();

      } else {

         $events = Event::all();

      }

      return view('welcome', ['events' => $events, 'search' => $search]);

   }



    //===================================
    //View create, exibe a tela do formulario
   public function create() {
    
    return view('events.create');

   }



    //===================================
    //View store, insere dados no banco
   public function store(Request $request){

      $event = new Event;

      $event->title = $request->title; 
      $event->date = $request->date;
      $event->city = $request->city; 
      $event->private = $request->private; 
      $event->description = $request->description; 
      $event->items = $request->items;

      // Image Upload
      if($request->hasFile('image') && $request->file('image')->isValid()) {

         $requestImage = $request->image;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('img/events'), $imageName);

         $event->image = $imageName;

      }

      $user = auth()->user();
      $event->user_id = $user->id;
      
      $event->save();

      return redirect('/')->with('msg', 'Evento criado com sucesso!');

   }



    //===================================
    //View show, exibe dados cadastrados no banco
   public function show ($id) {

    $event = Event::findOrFail($id);

    $user = auth()->user();
    $hasUserJoined = false;

    if($user) {

      $userEvents = $user->eventAsParticipant->toarray();

      foreach($userEvents as $userEvent) {
         if($userEvent['id'] == $id) {
            $hasUserJoined = true;
         }

      }
    }

    $eventOwer = User::where('id', $event->user_id)->first()->toArray();

    return view('events.show', ['event' => $event, 'eventOwer' => $eventOwer, 'hasUserJoined' => $hasUserJoined]);

   }



   public function dashboard() {

      $user = auth()->user();

      $events = $user->events;

      $eventASParticipant = $user->eventAsParticipant;

      return view('events.dashboard', ['events' => $events, 'eventASParticipant' => $eventASParticipant]);
      
   }



   public function destroy($id) {

      Event::findOrFail($id)->delete();

      return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');

   }



   public function edit($id) {
      
      $user = auth()->user();

      $event = Event::findOrFail($id);

      if($user->id != $event->user_id) {
         return redirect('/dashboard');
      }

      return view('events.edit', ['event' => $event]);

   }



   public function update(Request $request) {

      $data = $request->all();

      // Image Upload
      if($request->hasFile('image') && $request->file('image')->isValid()) {

         $requestImage = $request->image;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('img/events'), $imageName);

         $data['image'] = $imageName;

      } 


      Event::findOrFail($request->id)->update($data);

      return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');

   }



   public function joinEvent($id) {

      $user = auth()->user();

      $user->eventAsParticipant()->attach($id);

      $event = Event::findOrFail($id);

      return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento: ' . $event->title);

   }



   public function leaveEvent ($id) {

      $user = auth()->user();

      $user->eventAsParticipant()->detach($id);

      $event = Event::findOrFail($id);

      return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->title);

   }

}
