<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Director;

class ApiController extends Controller
{
    public function peliculas()
    {
        $peliculas = Pelicula::with('director')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'ok' => true,
            'mensaje' => 'Películas obtenidas correctamente',
            'total' => $peliculas->count(),
            'data' => $peliculas
        ]);
    }

    public function peliculaPorId($id)
    {
        $pelicula = Pelicula::with('director')->find($id);

        if (!$pelicula) {
            return response()->json([
                'ok' => false,
                'mensaje' => 'Película no encontrada',
                'data' => null
            ], 404);
        }

        return response()->json([
            'ok' => true,
            'mensaje' => 'Película obtenida correctamente',
            'data' => $pelicula
        ]);
    }

    public function directores()
    {
        $directores = Director::with('peliculas')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'ok' => true,
            'mensaje' => 'Directores obtenidos correctamente',
            'total' => $directores->count(),
            'data' => $directores
        ]);
    }

    public function directorPorId($id)
    {
        $director = Director::with('peliculas')->find($id);

        if (!$director) {
            return response()->json([
                'ok' => false,
                'mensaje' => 'Director no encontrado',
                'data' => null
            ], 404);
        }

        return response()->json([
            'ok' => true,
            'mensaje' => 'Director obtenido correctamente',
            'data' => $director
        ]);
    }
}