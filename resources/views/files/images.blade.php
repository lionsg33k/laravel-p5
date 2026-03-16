@extends('layouts.index')


@section('content')
    <form enctype="multipart/form-data" class=" flex flex-col space-y-6 items-center justify-center bg-amber-600" action="/images/store" method="POST">
        @csrf
        <div class="flex flex-col items-center space-y-6">
            <label for="">Upload Image</label>
            <input accept="image/png" name="file" class="bg-white" type="file">
        </div>
        <button>Save</button>
    </form>

<div class="">

    @foreach ($images as $image)
    
    <img src="{{ asset("storage/$image->images") }}" alt="">
    
    <h1>{{ $image->images }}</h1>
    @endforeach
</div>
@endsection
