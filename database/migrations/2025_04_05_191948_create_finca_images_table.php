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
        Schema::create('finca_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('finca_id_fk');
            $table->timestamps();
            $table->foreign('finca_id_fk')->references('id')->on('finca')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finca_images');
    }
};
