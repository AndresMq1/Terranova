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
        Schema::create('terreno', function (Blueprint $table) {
            $table->id();
            $table->string('tamanoTerreno');
            $table->string('ubicacionTerreno');
            $table->string('tipoSuelo');
            $table->string('tipografiaTerreno');
            $table->string('fuentesAgua');
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
        Schema::dropIfExists('terreno');
    }
};
