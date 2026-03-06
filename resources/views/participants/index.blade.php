@extends('layouts.index')


@section('content')
    <h1>hello participants</h1>

    <hr>
    <hr>
    <hr>


    @foreach ($participants as $participant)
      
    <div class="p-6 border">

        <a href="{{ route("participant.show" , $participant) }}">{{ $participant->name }}</a>
        <a href="/particpant/show/{{ $participant->id }}">{{ $participant->name }}</a>
    </div>
    @endforeach



    <form method="POST" action="{{ route("participant.store") }}" class="flex flex-col space-y-5  border w-1/3 bg-amber-950 p-6 mx-auto">

        {{-- todo: remove csrf --}}
        @csrf

        <h1 class="text-white text-2xl font-bold text-center">PArticipant registration</h1>
        <input required name="name" class="border border-white placeholder:text-white/80 text-white px-4 py-2" placeholder="please insert your name" type="text">
        <input required name="age" class="border border-white placeholder:text-white/80 text-white px-4 py-2" placeholder="please insert your age" type="number" min="0" max="100">
        <input required name="phone" class="border border-white placeholder:text-white/80 text-white px-4 py-2" placeholder="please insert your phone" type="text">
        <input required name="cin" class="border border-white placeholder:text-white/80 text-white px-4 py-2" placeholder="please insert your cin" type="text">

        {{-- <input class="border border-white placeholder:text-white/80 text-white px-4 py-2"  name="email" type="email"> --}}
        <button class="bg-amber-400 px-3 py-1 rounded-lg">Submit REgistration</button>

    </form>
@endsection
