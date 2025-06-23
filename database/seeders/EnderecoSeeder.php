<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Endereco; // Importe a Model Endereco

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa a tabela antes de popular, para evitar duplicações em testes
        Endereco::truncate(); // CUIDADO: Isso apaga TODOS os dados da tabela Endereco!

        Endereco::create([
            'endereco' => 'Rua das Flores',
            'numero' => '123',
            'bloco' => 'A',
            'andar' => '5',
            'sala' => '501',
            'apartamento' => null,
            'cep' => '12345-678',
            'localizacao' => 'Próximo à praça central',
            'complemento' => 'Apto 501',
            'bairro' => 'Centro',
            'cidade' => 'Feira de Santana', // Adaptado para a sua localização
            'estado' => 'BA',
            'localidade' => 'Feira de Santana',
        ]);

        Endereco::create([
            'endereco' => 'Avenida do Sol',
            'numero' => '456',
            'bloco' => null,
            'andar' => null,
            'sala' => null,
            'apartamento' => '102',
            'cep' => '87654-321',
            'localizacao' => 'Edifício Solar',
            'complemento' => null,
            'bairro' => 'Boa Vista',
            'cidade' => 'Feira de Santana',
            'estado' => 'BA',
            'localidade' => 'Feira de Santana',
        ]);

        Endereco::create([
            'endereco' => 'Travessa da Lua',
            'numero' => '789',
            'bloco' => 'C',
            'andar' => '2',
            'sala' => null,
            'apartamento' => null,
            'cep' => '11223-344',
            'localizacao' => 'Galpão industrial',
            'complemento' => 'Fundo',
            'bairro' => 'Distrito Industrial',
            'cidade' => 'Salvador', // Um endereço em outra cidade para teste
            'estado' => 'BA',
            'localidade' => 'Salvador',
        ]);

        $this->command->info('Endereços criados com sucesso!'); // Feedback no console
    }
}