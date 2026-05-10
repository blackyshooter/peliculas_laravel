@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>Agregar Director</h2>
        <a href="{{ route('directores.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('directores.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del director</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>

        <label for="imagen_url">URL de imagen del director</label>
        <input
            type="text"
            name="imagen_url"
            id="imagen_url"
            value="{{ old('imagen_url') }}"
            placeholder="https://ejemplo.com/director.jpg"
        >

        <button type="submit" class="btn btn-success">Guardar Director</button>
    </form>
@endsection