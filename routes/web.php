<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return redirect()->route('peliculas.index');
});

Route::get('/directores', [DirectorController::class, 'index'])->name('directores.index');
Route::get('/directores/crear', [DirectorController::class, 'create'])->name('directores.create');
Route::post('/directores', [DirectorController::class, 'store'])->name('directores.store');

Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
Route::get('/peliculas/crear', [PeliculaController::class, 'create'])->name('peliculas.create');
Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');

Route::get('/api/peliculas', [ApiController::class, 'peliculas'])->name('api.peliculas');
Route::get('/api/peliculas/{id}', [ApiController::class, 'peliculaPorId'])->name('api.peliculas.show');

Route::get('/api/directores', [ApiController::class, 'directores'])->name('api.directores');
Route::get('/api/directores/{id}', [ApiController::class, 'directorPorId'])->name('api.directores.show');