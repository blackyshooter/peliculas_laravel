@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>Directores</h2>
        <a href="{{ route('directores.create') }}" class="btn btn-success">Agregar Director</a>
    </div>

    @if($directores->count() > 0)
        <div class="cards-grid">
            @foreach($directores as $director)
                <div class="director-card">
                    @if($director->imagen_url)
                        <img src="{{ $director->imagen_url }}" alt="{{ $director->nombre }}" class="director-photo">
                    @else
                        <img src="https://via.placeholder.com/400x300?text=Director" alt="Sin imagen" class="director-photo">
                    @endif

                    <div class="card-body">
                        <span class="badge">{{ $director->peliculas_count }} película(s)</span>
                        <h3>{{ $director->nombre }}</h3>

                        <p class="card-info">
                            <strong>ID:</strong> {{ $director->id }}
                        </p>

                        <p class="card-info">
                            <strong>Fecha de carga:</strong>
                            {{ $director->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty">
            No hay directores registrados todavía.
        </div>
    @endif
@endsection