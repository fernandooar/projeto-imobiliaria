<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Imobiliaria;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    /**
     * Exibe uma lista de usuários juntamente com seus endereços e imobiliárias.
     *
     * Recupera todos os usuários do banco de dados, incluindo seus endereços ('enderecos')
     * e imobiliárias ('imobiliarias'), e passa para a view 'usuarios.index'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $usuarios = Usuario::with(['endereco', 'imobiliaria'])->get();
        return view('usuarios.index', compact('usuarios'));
    }


    /**
     * Exibe o formulário de criação de usuário.
     *
     * Busca todos os endereços e imobiliárias existentes para popular os campos de seleção (dropdowns)
     * no formulário de criação de usuário. Em seguida, retorna a view 'usuarios.create' passando as listas
     * de endereços e imobiliárias como variáveis.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        /**
         * Para os campos de seleção (dropdowns) de Endereços e Imobiliarias,
         * precisa buscar todos os endereços e imobiliarias existentes para popular as opções
         */
        $enderecos = Endereco::all();
        $imobiliarias = Imobiliaria::all();
        //Passa a lista para a view do formulário
        return view('usuarios.create', compact('enderecos', 'imobiliarias'));
    }

    /**
     * Armazena um novo usuário no banco de dados.
     *
     * Valida os dados recebidos da requisição para criar um novo usuário, garantindo que todos os campos obrigatórios
     * estejam presentes e corretamente formatados. Mensagens de validação personalizadas são fornecidas para maior clareza.
     *
     * As regras de validação incluem:
     * - Campos obrigatórios: nome_completo, email, senha, cpf, tipo_usuario, nivel_acesso
     * - Restrições de unicidade: email, cpf, creci, matricula
     * - Verificações de formato e tamanho para strings, emails, datas e URLs
     * - Verificações booleanas para diversos flags (telefone1_whatsapp, telefone2_whatsapp, ativo, receber_email, receber_sms, receber_whatsapp)
     * - Verificação de existência para entidades relacionadas (endereco_id, imobiliaria_id)
     * - Validação ENUM para tipo_usuario
     * - Campos opcionais (nullable) para informações adicionais do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email|max:150',
            'senha' => 'required|string|min:8|confirmed', // 'confirmed' exige 'senha_confirmation' no formulário
            'telefone1' => 'nullable|string|max:20', // Agora é nullable no seu BD
            'telefone1_whatsapp' => 'boolean', // Mapeia para TINYINT(1)
            'telefone2' => 'nullable|string|max:20',
            'telefone2_whatsapp' => 'boolean',
            'endereco_id' => 'nullable|exists:enderecos,id', // Pode ser nullable no BD, mas verifica se ID existe
            'cpf' => 'required|string|unique:usuarios,cpf|max:45',
            'rg' => 'nullable|string|max:45',
            'orgao_emissor' => 'nullable|string|max:45',
            'data_nascimento' => 'nullable|date',
            'estado_civil' => 'nullable|string|max:20',
            'profissao' => 'nullable|string|max:100',
            'empresa' => 'nullable|string|max:100',
            'cargo' => 'nullable|string|max:100',
            'salario' => 'nullable|string|max:20',
            'cep' => 'nullable|string|max:10', // CEP do USUÁRIO, não do endereço de relacionamento
            'creci' => 'nullable|string|unique:usuarios,creci|max:50',
            'foto_url' => 'nullable|url|max:255',
            'matricula' => 'nullable|string|unique:usuarios,matricula|max:50',
            'tipo_usuario' => 'required|in:administrador,corretor,cliente,proprietario,locatario,funcionario', // Valores ENUM exatos
            //'nivel_acesso' => 'required|integer', // NOT NULL DEFAULT '1' no BD
            'ativo' => 'boolean',
            'receber_email' => 'boolean',
            'receber_sms' => 'boolean',
            'receber_whatsapp' => 'boolean',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'imobiliaria_id' => 'nullable|exists:imobiliarias,id', // Pode ser nullable no banco de dados
        ], [
            // Mensagens de validação personalizadas para clareza ao usuário
            'nome_completo.required' => 'O nome completo é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter no mínimo :min caracteres.',
            'senha.confirmed' => 'A confirmação de senha não corresponde.',
            'telefone1.required' => 'Pelo menos um telefone é obrigatório.', // Se for REQUIRED no bnco de dados ou regra de negócio
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'creci.unique' => 'Este CRECI já está cadastrado.',
            'matricula.unique' => 'Esta matrícula já está cadastrada.',
            'endereco_id.exists' => 'O endereço selecionado não é válido.',
            'imobiliaria_id.exists' => 'A imobiliária selecionada não é válida.',
            'tipo_usuario.required' => 'O tipo de usuário é obrigatório.',
            'tipo_usuario.in' => 'O tipo de usuário selecionado é inválido.',
            'nivel_acesso.required' => 'O nível de acesso é obrigatório.',
        ]);

        /**
         * Recupera todos os dados do formulário da requisição, exceto os campos '_token' e 'senha_confirmation'.
         * Isso é útil para excluir campos sensíveis ou desnecessários antes de processar ou armazenar os dados do usuário.
         *
         * @var array $userData Os dados filtrados do usuário.
         */
        $userData = $request->except(['_token', 'senha_confirmation']);

        /**
         * Tratamento dos checkbox
         * $request->has('campo): Retorna 'true' SE o chekbox foi marcado (enviou '1'), false caso contário
         * O cast 'boolean' na Model encarrega-se de converter para 0 ou 1 no banco de dados
         * O código para $userData['campo_boolean'] = $request->has('campo_boolean'); é CORRETO e necessário para checkboxes, 
         * pois se não forem marcados, eles não são enviados no request, e has() os trata como false.
         */
        $userData['telefone1_whatsapp'] = $request->has('telefone1_whatsapp');
        $userData['telefone2_whatsapp'] = $request->has('telefone2_whatsapp');
        $userData['ativo'] = $request->has('ativo');
        $userData['receber_email'] = $request->has('receber_email');
        $userData['receber_sms'] = $request->has('receber_sms');
        $userData['receber_whatsapp'] = $request->has('receber_whatsapp');

        // LÓGICA DE CONTROLE DE NÍVEL DE ACESSO COM BASE NO TIPO DE USUÁRIO
        $tipoUsuarioSelecionado  = $request->input('tipo_usuario');
        $nivenivelAcessoAtribuido = 0;

        switch ($tipoUsuarioSelecionado) {
            case 'administrador':
                $nivenivelAcessoAtribuido = 1; 
                break;
            case 'corretor':
                $nivenivelAcessoAtribuido = 2;
                break;
            case 'funcionario':
                $nivenivelAcessoAtribuido = 3;
                break;
            case 'cliente':
            case 'proprietario':
            case 'locatario':
            default: // Caso algum valor inesperado (garantido pelo 'in' da validação)
                $nivenivelAcessoAtribuido = 4; // Nível padrão para usuários básicos
                break;           

        }

        //Cria a instÂncia do usuário, mas ATRIBUIR MANUALMENTE os campos $guardade
        $usuario = new Usuario();
        $usuario->fill($userData); // Preenche os campos que NÃO estão no $guarded

        /*
         * Fazendo a ATRIBUIÇÃO MANUAL DO CAMPOS '$guarded' que vem do formuçário
         * tipo_usuario vem do formulkário, ou atribuimos 
         */
        $usuario->tipo_usuario = $tipoUsuarioSelecionado;
        $usuario->nivel_acesso = $nivenivelAcessoAtribuido; // nivel_acesso é definido PELA LÓGICA, sobrescrevendo qualquer coisa do formulário.
        $usuario->ativo = $request->input('ativo');
        $usuario->imobiliaria_id = $request->input('imobiliaria_id'); // Imobiliaria vem do formulário

        $usuario->save();
       

        // Redireciona para a lista de usuários com uma mensagem de sucesso (flash message)
        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
