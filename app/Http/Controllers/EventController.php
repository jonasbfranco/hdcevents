<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
   
    //===================================
    //View Index, retonar todos os valores
    public function index() {
    
    $events = Event::all();

    return view('welcome', ['events' => $events]);
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
      $event->city = $request->city; 
      $event->private = $request->private; 
      $event->description = $request->description; 

      // Image Upload
      if($request->hasFile('image') && $request->file('image')->isValid()) {

         $requestImage = $request->image;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('img/events'), $imageName);

         $event->image = $imageName;

      }
      
      $event->save();

      return redirect('/')->with('msg', 'Evento criado com sucesso!');

   }


    //===================================
    //View show, exibe dados cadastrados no banco
   public function show ($id) {

    $event = Event::findOrFail($id);

    return view('events.show', ['event' => $event]);

   }

}
