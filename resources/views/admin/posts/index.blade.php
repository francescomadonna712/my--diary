@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tutti i Post</h1>
        @if ($posts->isEmpty())
            <p>Nessun post trovato.</p>
        @else
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="200">
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
