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
        Schema::create('citas', function (Blueprint $table) {
            
            $table->increments('id_Cita');
            $table->unsignedInteger('id_Calendario');
            $table->enum('estado', ['pendiente', 'confirmado', 'cancelada']);

            $table->foreign('id_Calendario')->references('id_Calendario')->on('calendarios');
            
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
