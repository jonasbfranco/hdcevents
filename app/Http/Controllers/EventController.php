<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
   public function index() {
    $nome = "Jonas";
    $idade = 42;

    $arr = [10,20,30,40,50];

    $nomes = ["Jonas", "Joao", "Maria", "Saulo"];

    return view('welcome', 
        [   
            'nome'      => $nome,
            'idade2'    => $idade,
            'profissao' => "Programador",
            'arr'       => $arr,
            'nomes'     => $nomes   
        ]);
   }

   public function create() {
    return view('events.create');
   }
}
