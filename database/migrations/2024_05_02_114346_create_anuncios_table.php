<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
            $table->foreignId('habilidad_buscada')->constrained('habilidades')->onDelete('cascade');
            $table->foreignId('habilidad_ofrecida')->constrained('habilidades')->onDelete('cascade');
            $table->string('tituloB');
            $table->text('descripcion_Bus');
            $table->string('titulo_of');
            $table->text('descripcion_of');
            $table->string('Ciudad', 50);
            $table->string('Localidad', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
