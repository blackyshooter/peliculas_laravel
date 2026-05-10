<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directores = Director::withCount('peliculas')
            ->orderBy('id', 'desc')
            ->get();

        return view('directores.index', compact('directores'));
    }

    public function create()
    {
        return view('directores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen_url' => 'nullable|string|max:1000',
        ]);

        $director = Director::create([
            'nombre' => $request->nombre,
            'imagen_url' => $request->imagen_url,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'mensaje' => 'Director registrado correctamente.',
                'data' => $director,
            ]);
        }

        return redirect()->route('directores.index')
            ->with('success', 'Director registrado correctamente.');
    }
}