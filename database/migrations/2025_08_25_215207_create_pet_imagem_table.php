<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_imagem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pet')->constrained('pet')->onDelete('cascade');
            $table->string('tipo');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_imagem');
    }
};