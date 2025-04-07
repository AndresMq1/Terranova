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
        Schema::create('ganado_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('ganado_id_fk');
            $table->timestamps();
            $table->foreign('ganado_id_fk')->references('id')->on('ganado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganado_images');
    }
};
