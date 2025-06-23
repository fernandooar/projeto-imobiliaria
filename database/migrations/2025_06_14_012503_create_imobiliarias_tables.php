<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Tabela: Imobiliarias
         * Descrição: Armazena informações sobre as imobiliárias cadastradas no sistema.
         */

         Schema::create('imobiliarias', function(Blueprint $table){

            $table->id();
            $table->string('nome_fantasia', 255);
            $table->string('razao_social', 255);
            $table->string('cnpj', 50);
            $table->string('telefone', 20);
            $table->string('telefone2', 20)->nullable();
            $table->string('email', 150);
            $table->string('creci', 20);
            $table->string('logo_url', 255)->nullable();
            $table->foreignId('endereco_id')->constrained('enderecos');
            $table->timestamps();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imobiliarias_tables');
    }
};
