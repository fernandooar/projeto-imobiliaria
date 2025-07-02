<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa o Facde para autenticação
use Illuminate\Validation\ValidationException; // Para tratamento de erros de validação que podemos personalizar
use Illuminate\Support\Facades\Hash; // Importa o Facade para hash de senhas


class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     * Esta rota será usada quando o Laravel redirecionar usuários não autenticados.
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Retorna a view de login
    }

    public function authenticate(Request $request)
    {
       $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        // Tenta autenticar o usuário
        // 'senha' é o nome da coluna fornecida pelo banco de dados
        if (Auth::attempt(['email' => $credenciais['email'], 'senha' => $credenciais['password']], $request->boolean('remember'))){
            $request->session()->regenerate(); //Regenera a sessão para segunrança
            
            // Se logou com sucesso, redireciona a rota padrão de dashboard
            return redirect()->intended('/dashboard-generico');
        } else {
            //Se o login falhou, redireciona de volta com erro
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas não correspondem aos nossos registros.'],
            ]);
        }
        // // --- INÍCIO DA DEPURARÃO EXTREMA ---

        // // 1. Tenta encontrar o usuário pelo email
        // $user = \App\Models\Usuario::where('email', $credenciais['email'])->first();

        // // 2. Verifica se o usuário foi encontrado e se a senha bate manualmente
        // $passwordMatches = false;
        // if ($user) {
        //     $passwordMatches = Hash::check($credenciais['password'], $user->senha);
        // }

        // // 3. Tenta autenticar usando Auth::attempt() (nossa principal suspeita)
        // // Usamos Auth::once() para evitar que a sessão seja iniciada
        // // Isso nos permite isolar o problema de credenciais vs. problema de sessão
        // $authAttemptResult = Auth::once([
        //     'email' => $credenciais['email'],
        //     'senha' => $credenciais['password']
        // ]);

        // // 4. Exibir todos os resultados com dd()
        // dd([
        //     'Credenciais do formulário' => $credenciais,
        //     'Usuário encontrado no DB' => $user ? $user->toArray() : 'NÃO ENCONTRADO',
        //     'Senha do DB (hash)' => $user ? $user->senha : 'N/A',
        //     'Senha digitada (texto puro)' => $credenciais['password'],
        //     'Ativo do usuário no DB' => $user ? $user->ativo : 'N/A',
        //     'Resultado Hash::check (manual)' => $passwordMatches,
        //     'Resultado Auth::once (autenticação sem sessão)' => $authAttemptResult, // Deve ser true se as credenciais batem
        //     'Resultado Auth::attempt (autenticação com sessão)' => Auth::attempt([
        //         'email' => $credenciais['email'],
        //         'senha' => $credenciais['password']
        //     ], $request->boolean('remember')), // Chamada real ao Auth::attempt para ver o que acontece
        // ]);
    }



    

    /**
     * Faz o logout do usuário autenticado, invalida a sessão atual,
     * regenera o token CSRF e redireciona para a página inicial (index).
     *
     * @param  \Illuminate\Http\Request  $request  Instância da requisição HTTP atual.
     * @return \Illuminate\Http\RedirectResponse   Redireciona para a página inicial após o logout.
     */
    public function logout(Request $request)
    {
        Auth::logout(); //Faz o logout do usuário
        $request->session()->invalidate(); //Invalida a sessão atual
        $request->session()->regenerateToken(); //Gera um novo TOKEN CSRF
        return redirect('/');
    }
}
