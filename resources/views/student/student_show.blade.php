@extends("layouts.index")

@section('content')


<h1>{{ $student->name }}</h1>




@forelse ($student->posts as $post)
    
<h1>{{ $post->post }}</h1>
@empty
    
@endforelse


@endsection