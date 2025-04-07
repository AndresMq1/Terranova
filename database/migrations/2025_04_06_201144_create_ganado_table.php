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
        Schema::create('ganado', function (Blueprint $table) {
            $table->id();
            $table->string('razaGanado');
            $table->string('edadGanado');
            $table->string('pesoGanado');
            $table->string('generoGanado');
            $table->string('tipoGanado');
            $table->string('ubicacionGanado');
            $table->string('vacunasGanado');
            $table->integer('cantidadGanado');
            $table->unsignedBigInteger('producto_id_fk');
            $table->foreign('producto_id_fk')->references('id')->on('producto')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganado');
    }
};
