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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto');
            $table->string('descripcion');
            $table->string('precioProducto');
            $table->string('cod_tipop_fk',1);
            $table->unsignedBigInteger('cod_vendedor_fk');
            $table->timestamps();
            $table->foreign('cod_tipop_fk')->references('cod_tipop')->on('tipop');
            $table->foreign('cod_vendedor_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
