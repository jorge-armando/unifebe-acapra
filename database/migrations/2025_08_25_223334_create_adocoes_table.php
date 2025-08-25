<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adocoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->date('data_nasc');
            $table->string('email');
            $table->string('renda_mensal');
            $table->string('casa_ou_apt');
            $table->string('propriedade');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('ponto_ref')->nullable();
            $table->string('cachorro_ou_gato');
            $table->string('nome_animal');
            $table->string('outros_animais')->nullable();
            $table->string('castrados_e_vacinados')->nullable();
            $table->string('espaco_adequado')->nullable();
            $table->string('acesso_rua')->nullable();
            $table->string('qual_local')->nullable();
            $table->string('tem_telas')->nullable();
            $table->string('gato_acesso_rua')->nullable();
            $table->string('condicoes_fisicas');
            $table->string('castracao_vacinacao');
            $table->string('adocao_colaborativa');
            $table->string('doc_identidade')->nullable();
            $table->string('foto_local')->nullable();
            $table->string('foto_outros_animais')->nullable();
            $table->string('foto_telas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adocoes');
    }
};
