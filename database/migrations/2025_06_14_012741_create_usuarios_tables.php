<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); 
        $table->timestamps(); 
        // Campos base do usuário
        $table->string('nome_completo', 255); 
        $table->string('email', 150)->unique(); 
        $table->string('senha', 255); 
        // Telefones
        $table->string('telefone1', 20)->nullable(); 
        $table->boolean('telefone1_whatsapp')->default(false); 
        $table->string('telefone2', 20)->nullable(); 
        $table->boolean('telefone2_whatsapp')->default(false); 
        // Documentos e dados pessoais
        $table->string('cpf', 45)->unique();
        $table->string('rg', 45)->nullable(); 
        $table->string('orgao_emissor', 45)->nullable(); 
        $table->date('data_nascimento')->nullable(); 
        $table->string('estado_civil', 20)->nullable(); 
        $table->string('profissao', 100)->nullable(); 
        $table->string('empresa', 100)->nullable(); 
        $table->string('cargo', 100)->nullable(); 
        $table->string('salario', 20)->nullable();
        $table->string('cep', 10)->nullable(); 
        // Dados de corretor/funcionário
        $table->string('creci', 50)->nullable()->unique(); 
        $table->string('foto_url', 255)->nullable(); 
        $table->string('matricula', 50)->nullable()->unique(); 
        // Tipos e níveis de acesso
        $table->enum('tipo_usuario', ['administrador','corretor','cliente','proprietario','locatario','funcionario'])->default('cliente'); 
        $table->integer('nivel_acesso')->default(1); 
        // Status e preferências de contato
        $table->boolean('ativo')->default(true); 
        $table->boolean('receber_email')->default(true); 
        $table->boolean('receber_sms')->default(false); 
        $table->boolean('receber_whatsapp')->default(false); 
        // Redes sociais
        $table->string('instagram', 255)->nullable(); 
        $table->string('facebook', 255)->nullable(); 
        $table->string('twitter', 255)->nullable(); 
        $table->string('linkedin', 255)->nullable();
        // Token de lembrar (usado pela autenticação do Laravel)
        $table->rememberToken(); // VARCHAR(100) NULL DEFAULT NULL (gerenciado pelo Authenticatable)
        // Chaves estrangeiras (Nullable e ON DELETE SET NULL como no seu script SQL)
        $table->foreignId('endereco_id')->nullable()->constrained('enderecos')->onDelete('set null'); 
        $table->foreignId('imobiliaria_id')->nullable()->constrained('imobiliarias')->onDelete('set null'); 
    });
}

public function down(): void
{
    Schema::dropIfExists('usuarios');
}
};
