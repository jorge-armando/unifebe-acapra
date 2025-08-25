<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('adocoes', function (Blueprint $table) {
            $table->string('status')->default('pendente')->after('adocao_colaborativa');
        });
    }

    public function down()
    {
        Schema::table('adocoes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
