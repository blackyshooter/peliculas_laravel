@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>Agregar Película</h2>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    @if($directores->count() == 0)
        <div class="alert-error">
            Primero tenés que registrar al menos un director.
        </div>

        <a href="{{ route('directores.create') }}" class="btn btn-success">Crear Director</a>
    @else
        <form action="{{ route('peliculas.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div>
                    <label for="nombre">Nombre de la película</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div>
                    <label for="director_id">Director</label>
                    <select name="director_id" id="director_id" required>
                        <option value="">Seleccione un director</option>
                        @foreach($directores as $director)
                            <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
                                {{ $director->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="genero">Género</label>
                    <input type="text" name="genero" id="genero" value="{{ old('genero') }}" required>
                </div>

                <div>
                    <label for="fecha_estreno">Fecha de estreno</label>
                    <input type="date" name="fecha_estreno" id="fecha_estreno" value="{{ old('fecha_estreno') }}" required>
                </div>

                <div>
                    <label for="duracion">Duración en minutos</label>
                    <input type="number" name="duracion" id="duracion" value="{{ old('duracion') }}" required>
                </div>

                <div>
                    <label for="calificacion">Calificación</label>
                    <input type="number" step="0.01" min="0" max="10" name="calificacion" id="calificacion" value="{{ old('calificacion') }}" required>
                </div>

                <div>
                    <label for="idioma">Idioma</label>
                    <input type="text" name="idioma" id="idioma" value="{{ old('idioma') }}" required>
                </div>

                <div class="form-full">
                    <label for="poster">URL del poster</label>
                    <textarea name="poster" id="poster" rows="3" placeholder="https://ejemplo.com/poster.jpg">{{ old('poster') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar Película</button>
        </form>
    @endif
@endsection