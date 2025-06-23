<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\after;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('enderecos', function (Blueprint $table) {
            // Adicionando novas colunas
            $table->string('complemento', 255)->nullable()->after('apartamento');
            $table->string('bairro', 255)->nullable()->after('complemento');
            $table->string('cidade', 255)->nullable()->after('bairro');
            $table->string('estado', 2)->nullable()->after('cidade');
            $table->string('localidade', 255)->nullable()->after('cep');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropColumn([
                'complemento',
                'bairro',
                'cidade',
                'estado',
                'localidade'
            ]);
        });
    }
};
