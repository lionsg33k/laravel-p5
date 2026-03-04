@extends('layouts.index')


@section('content')
    <h1>hello participants</h1>

    <hr>
    <hr>
    <hr>


    @foreach ($participants as $participant )
        

    <h1>{{ $participant->name }}</h1>
    <hr>
    @endforeach




    {{-- @dump($participants ) --}}

    @endsection
