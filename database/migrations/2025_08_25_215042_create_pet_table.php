<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->boolean('mostrar')->default(1);
            $table->string('nome');
            $table->string('raca')->nullable();
            $table->string('sexo');
            $table->integer('idade');
            $table->string('porte');
            $table->string('detalhes')->nullable(); 
            $table->longText('historia')->nullable();
            $table->longText('complicacoes')->nullable();
            $table->longText('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
