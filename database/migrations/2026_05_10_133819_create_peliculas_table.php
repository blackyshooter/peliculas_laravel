<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->foreignId('director_id')->constrained('directores')->onDelete('cascade');
            $table->string('genero');
            $table->date('fecha_estreno');
            $table->integer('duracion');
            $table->float('calificacion', 3, 2);
            $table->text('poster')->nullable();
            $table->string('idioma');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};