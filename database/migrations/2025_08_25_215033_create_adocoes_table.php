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
        Schema::create('adocoes', function (Blueprint $table) {
            $table->id();
            
            // Informações pessoais
            $table->string('nome_completo');
            $table->date('data_nasc');
            $table->string('email');
            $table->string('renda_mensal');
            $table->string('casa_ou_apt');
            $table->enum('propriedade', ['proprio', 'alugado']);
            
            // Endereço
            $table->string('cep');
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('ponto_ref')->nullable();

            // Informações sobre o animal
            $table->enum('cachorro_ou_gato', ['cachorro', 'gato']);
            $table->string('nome_animal')->nullable();
            $table->string('outros_animais')->nullable();
            $table->string('castrados_e_vacinados')->nullable();
            $table->string('espaco_adequado')->nullable();
            $table->string('acesso_rua')->nullable();
            $table->string('qual_local')->nullable();
            $table->string('tem_telas')->nullable();
            $table->string('gato_acesso_rua')->nullable();

            // Documentação (links dos arquivos enviados)
            $table->string('doc_identidade')->nullable();
            $table->string('foto_local')->nullable();
            $table->string('foto_outros_animais')->nullable();
            $table->string('foto_telas')->nullable();

            // Termos e condições
            $table->enum('condicoes_fisicas', ['sim', 'nao']);
            $table->enum('castracao_vacinacao', ['sim', 'nao']);
            $table->enum('adocao_colaborativa', ['sim', 'nao']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adocoes');
    }
};
