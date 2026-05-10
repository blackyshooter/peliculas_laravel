<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Director;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::with('director')
            ->orderBy('id', 'desc')
            ->get();

        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        $directores = Director::orderBy('nombre', 'asc')->get();

        return view('peliculas.create', compact('directores'));
    }

    public function store(Request $request)
    {
        $pelicula = Pelicula::create([
            'nombre' => $request->nombre,
            'director_id' => $request->director_id,
            'genero' => $request->genero,
            'fecha_estreno' => $request->fecha_estreno,
            'duracion' => $request->duracion,
            'calificacion' => $request->calificacion,
            'poster' => $request->poster,
            'idioma' => $request->idioma,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'mensaje' => 'Película registrada correctamente.',
                'data' => $pelicula,
            ]);
        }

        return redirect()->route('peliculas.index')
            ->with('success', 'Película registrada correctamente.');
    }
}