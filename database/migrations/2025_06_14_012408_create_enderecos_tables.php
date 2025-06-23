<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //
        /*Tabela: Endereco
            *Descrição: Armazena informações detalhadas sobre os endereços.
        */
        Schema::create('enderecos', function(Blueprint $table) {
            $table->id(); //id INT primary key auto_increment
            $table->string('endereco', 255); // Rua, Aveninda, ECT
            $table->string('numero',10)->nullable();
            $table->string('condominio', 150)->nullable();
            $table->string('bloco', 50)->nullable();
            $table->string('andar', 50)->nullable();
            $table->string('sala', 50)->nullable();
            $table->string('apartamento', 50)->nullable();
            $table->string('cep', 10);
            $table->string('localizacao', 255); //Pode armazenar informações de geolocalização ou descrição da localização
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos_tables');
    }
};
