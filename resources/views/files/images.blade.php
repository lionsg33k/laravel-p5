@extends('layouts.index')


@section('content')
    <form enctype="multipart/form-data" class=" flex flex-col space-y-6 items-center justify-center bg-amber-600"
        action="/images/store" method="POST">
        @csrf
        <div class="flex flex-col items-center space-y-6">
            <label for="">Upload Image</label>
            <input accept="image/png" name="file" class="bg-white" type="file">
        </div>
        <button>Save</button>
    </form>

    <div class="grid grid-cols-3 gap-5 p-5">

        @foreach ($images as $image)
            <div class="p-2 border border-alpha">

                <img src="{{ asset("storage/$image->images") }}" alt="">
                <div class="flex items-center justify-between py-3">

                    <div class=""></div>


                    <form action="/images/{{ $image->id }}/destroy" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="p-1 text-white bg-red-700">Delete</button>
                    </form>

                </div>

            </div>
            {{-- <h1>{{ $image->images }}</h1> --}}
        @endforeach
    </div>
@endsection
