<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'directores';

    protected $fillable = [
        'nombre',
        'imagen_url',
    ];

    public function peliculas()
    {
        return $this->hasMany(Pelicula::class);
    }
}