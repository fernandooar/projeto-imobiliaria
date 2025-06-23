<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /*
     * Pedimos a model endereco para trazer TOdos os endereços do banco de dados
     * e exibir na view 'enderecos.index'.
     */
    public function index()
    {
        $enderecos = Endereco::all();
        /**
         * Agora, 'empacotamos' esses endereços e os enviamos para a 'tela' (view).
         * A view 'enderecos.index' (resources/views/enderecos/index.blade.php)
         * receberá uma variável chamada 'enderecos' contendo os dados.
         */
        return view('enderecos.index', compact('enderecos'));
    }

    /*
     * Método para exibir o formulário de criação de um novo endereço.
     */
    public function create() 
    {
        // retorna a view 'enderecos.crate' para exibir o formulario de criação
        return view('enderecos.create');
    }

    /*
     * Método para armazenar um novo endereço no banco de dados.
     */
    public function store(Request $request)
    {
        /**
         * $request->validate([...]): O sistema de validação do Laravel é robusto. 
         * Ele verifica se os dados do formulário atendem às regras que você definiu. 
         * Se não atenderem, ele redireciona de volta para o formulário com as mensagens de erro.
         */
       $request->validate([
        'endereco' => 'required|string|max:255',
        'numero' => 'nullable|string|max:10',
        'bloco' => 'nullable|string|max:50',
        'andar' => 'nullable|string|max:50',
        'sala' => 'nullable|string|max:50',
        'apartamento' => 'nullable|string|max:50',
        'cep' => 'nullable|string|max:10',
        'complemento' => 'nullable|string|max:255',
        'bairro' => 'nullable|string|max:255',
        'cidade' => 'nullable|string|max:255',
        'estado' => 'nullable|string|max:2',
        'localidade' => 'nullable|string|max:255',
    ],
        [
            'endereco.required' => 'O logradouro é obrigatório.',
            'endereco.string' => 'O Logradouro deve ser um Texto.',
            'endereco.max' => 'O logradouro não pode ter mais de :max caracteres.',
        ]);

        /**
         * Se a validação passar, cria um novo endereço Usando a model Endereco::create().
         * $request->all() pega todos os dados do formulário.
         * 
         */
        Endereco::create($request->all());

        /**
         * Após criar o endereço, redireciona o usuário de volta para a lista de endereços.
         * Usamos  o nome da rota 'enderecos.index' para fazer isso.
         */
        return redirect()->route('enderecos.index')->with('success', 'Endereço criado com sucesso!');
    }
}
