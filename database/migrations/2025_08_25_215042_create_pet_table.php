<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id(); // id autoincrement
            $table->integer('tipo');
            $table->string('raca');
            $table->integer('sexo');
            $table->integer('idade');
            $table->string('porte');
            $table->longText('detalhes')->nullable();
            $table->longText('historia')->nullable();
            $table->longText('complicacao')->nullable();
            $table->longText('descricao')->nullable();
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet');
    }
};