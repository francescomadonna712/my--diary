@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center">
                        <h2>{{ Auth::user()->name }}</h2>
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image"
                            class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">

                        <p class="mt-3">Benvenuto nella tua dashboard!</p>

                        <!-- Pulsante Modifica Profilo -->
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-warning">Modifica Profilo</a>

                        <!-- Pulsante Elimina Profilo -->
                        <form action="{{ route('admin.profile.destroy') }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Sei sicuro di voler eliminare il tuo profilo?');">Elimina
                                Profilo</button>
                        </form>


                        <div class="mt-4">
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Vai ai tuoi post</a>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Crea un nuovo post</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Dashboard</h1>

        <h2>I tuoi post</h2>
        @if ($posts->isEmpty())
            <p>Non hai ancora scritto nessun post.</p>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                                @endif
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mt-3">Leggi di
                                    più</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
