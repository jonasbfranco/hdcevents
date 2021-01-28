@extends('layouts.main')

@section('title', 'Produto')

@section('content')

    @if($id != null)
        <p>Exibindo produdo id: {{ $id }}</p>
    @endif

@endsection