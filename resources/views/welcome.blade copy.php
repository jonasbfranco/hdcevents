@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <h1>Algum titulo</h1>

    <img src="/img/banner.jpg" alt="Banner">

    {{----------------------------------}}
    {{-- Unsado IF --}}

    @if(10 > 5)
        <p>A condicao é true</p>
    @endif

    <p>{{ $nome }}</p>

    @if($nome == "Pedro")
        <p>O nome é Pedro</p>
    @elseif($nome == "Jonas")
        <p>O nome é {{ $nome }} e ele tem {{ $idade2 }} anos, e trabalha como {{ $profissao }}</p>
    @else
        <p>O nome nao é Pedro</p>
    @endif

    {{----------------------------------}}
    {{-- Unsado FOR --}}

    @for($i = 0; $i < count($arr); $i++)
        <p>{{ $arr[$i] }} - {{ $i }}</p>
        @if($i == 2)
        <p>Oi o i é {{ $i }}</p>
        @endif
    @endfor

    {{----------------------------------}}
    {{-- Unsado FOREACH --}}

    @foreach($nomes as $nome)
        <p>{{ $loop->index }}</p>
        <p>{{ $nome }}</p>
    @endforeach


    {{----------------------------------}}
    {{-- Unsado PHP --}}

    @php
        $name = "Joao";
        echo $name;
    @endphp

    {{----------------------------------}}
    {{-- Este é o comentário do Blade --}}

@endsection
