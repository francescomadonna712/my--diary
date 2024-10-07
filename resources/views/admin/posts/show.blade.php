@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
        @endif
    </div>
@endsection
