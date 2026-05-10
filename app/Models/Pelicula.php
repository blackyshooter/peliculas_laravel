<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected $fillable = [
        'nombre',
        'director_id',
        'genero',
        'fecha_estreno',
        'duracion',
        'calificacion',
        'poster',
        'idioma',
    ];

    public function director()
    {
        return $this->belongsTo(Director::class);
    }
}