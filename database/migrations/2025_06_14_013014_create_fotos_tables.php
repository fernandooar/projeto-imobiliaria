<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
    {
        //
        Schema::create('fotos', function(Blueprint $table){
            $table->id();
            $table->string('foto_url');
            $table->foreignId('imovel_id')->constrained('imoveis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos_tables');
    }
};
