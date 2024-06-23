<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\on;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreignId('recurso_id');
            $table->foreign('recurso_id')->references('id')->on('recursos');
            $table->dateTime('fecha_hora_prestamo');
            $table->dateTime('fecha_hora_devolucion')->nullable();
            $table->dateTime('fecha_hora_entrega')->nullable();
            $table->string('motivo_prestamo');
            $table->string('observaciones');
            $table->string('estado');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
