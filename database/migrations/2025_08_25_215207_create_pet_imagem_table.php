<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_imagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pet')->constrained('pets')->onDelete('cascade');
            $table->string('path'); 
            $table->boolean('principal')->default(false); // define capa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_imagens');
    }
};
