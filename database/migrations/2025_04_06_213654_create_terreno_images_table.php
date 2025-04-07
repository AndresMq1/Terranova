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
        Schema::create('terreno_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('terreno_id_fk');
            $table->timestamps();
            $table->foreign('terreno_id_fk')->references('id')->on('terreno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terreno_images');
    }
};
