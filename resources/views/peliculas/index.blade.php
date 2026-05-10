@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>Películas</h2>
        <a href="{{ route('peliculas.create') }}" class="btn btn-success">Agregar Película</a>
    </div>

    @if($peliculas->count() > 0)
        <div class="cards-grid">
            @foreach($peliculas as $pelicula)
                <div class="movie-card">
                    @if($pelicula->poster)
                        <img src="{{ $pelicula->poster }}" alt="{{ $pelicula->nombre }}" class="movie-poster">
                    @else
                        <img src="https://via.placeholder.com/400x600?text=Sin+Poster" alt="Sin poster" class="movie-poster">
                    @endif

                    <div class="card-body">
                        <span class="badge">{{ $pelicula->genero }}</span>

                        <h3>{{ $pelicula->nombre }}</h3>

                        <p class="card-info">
                            <strong>Director:</strong> {{ $pelicula->director->nombre }}
                        </p>

                        <p class="card-info">
                            <strong>Estreno:</strong>
                            {{ \Carbon\Carbon::parse($pelicula->fecha_estreno)->format('d/m/Y') }}
                        </p>

                        <p class="card-info">
                            <strong>Duración:</strong> {{ $pelicula->duracion }} min
                        </p>

                        <p class="card-info">
                            <strong>Calificación:</strong> ⭐ {{ $pelicula->calificacion }}
                        </p>

                        <p class="card-info">
                            <strong>Idioma:</strong> {{ $pelicula->idioma }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty">
            No hay películas registradas todavía.
        </div>
    @endif
@endsection