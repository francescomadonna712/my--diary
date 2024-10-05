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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
