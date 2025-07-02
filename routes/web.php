<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use app\Http\Controllers\EnderecoController;


Route::get('/', function () {
    return view('index');
});


// -----------------// Rotas de autenticação \\-----------------
/**
 * Grupo de  Rotas de autenticação,  agrupamento simples sem prefixo URL, 
 * apenas para nittulo de organizar o código e a agrupar as rotas.
 */

 Route::group([], function () {
     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    //Rota para o processamento de login, o MODAL vai vir com o método POST sera direcionado para essa rota.
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    //Rota para o processamento de logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

 });

 // Rotas de autenticação simplificadas

 //Rota para exibir o formulario de login (nome 'login' é padrão para redirecionamentos do Laravel)
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

 // Rota para processar o login (o formulário envia para cá)
 Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Rota para um dashboard genérico (protegida por autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-generico', function () {
        return "<h1>Bem-vindo ao Dashboard Genérico!</h1><p>Você está logado como: ".Auth::user()->email."</p><form action='".route('logout')."' method='POST'>@csrf<button type='submit'>Sair</button></form>";
    })->name('dashboard-generico');
});


// // Dashboard, grupo de Rotas que exigem autentcação
// Route::middleware('auth')->group(function () {
//     // Rota generica para o dashboard, vai ser redirecionando no controller LoginController
//     Route::get('/dashboards', function () {
//         return "Você está logado, redirecionado para o dashboard.";
//     })->name('dashboard');
//     /**
//      * Route::middleware('auth'): Isso significa que todas as rotas dentro deste grupo só serão acessíveis se o usuário estiver logado.
//      * Caso não esteja logado, o usuário será redirecionado para a página de login.
//      * ->middleware('can:nome-da-permissao'): Isto é para o sistema de Gates e Policies do Laravel, que é a forma mais refinada de controlar permissões.
//      * Neste caso, a rota só será acessível se o usuário tiver a permissão 'view-profile'.
//     */     
//     Route::get('/admin/dashboards', function () {
//         return view('admin.dashboards');
//     })->name('admin.dashboards')->middleware('can:access-admin-dashboards');

//     Route::get('/corretor/dashbard', function () {
//         return view ('corretor.dasboard');
//     })->name('corretor.dashboards')->middleware('can:access-corretor-dashboards');

//     Route::get('/funcionario/dashbard', function () {
//         return view ('funcionario.dasboard');
//     })->name('funcionario.dashboards')->middleware('can:access-funcionario-dashboards');

//     Route::get('/cliente/dashbard', function () {
//         return view ('cliente.dasboard');
//     })->name('cliente.dashboards')->middleware('can:access-cliente-dashboards');    

// });


/**
 * Grupo de rotas para o CRUD de Endereços
 * Rotas para criar, editar, atualizar e excluir endereços
 */
Route::prefix('enderecos')->group(function () {
    // A Rota '/enderecos' agora vira '/' dentro do grupo 'enderecos'
    Route::get('/', [EnderecoController::class, 'index'])->name('enderecos.index');
    // A Rota '/enderecos/create' agora vira '/create' dentro do grupo
    Route::get('/criar', [EnderecoController::class, 'create'])->name('enderecos.create');
    // A Rota POST '/enderecos' agora vira '/' dentro do grupo
    Route::post('/', [EnderecoController::class, 'store'])->name('enderecos.store');
    // Podemos adicionar mais rotas aqui, como show, edit, update, destroy futuramente
    // Exemplo de rotas adicionais (comentadas para não interferir no funcionamento atual):
    // Route::get('/{id}', [EnderecoController::class, 'show'])->name('enderecos.show');
    // Route::get('/{id}/editar', [EnderecoController::class, 'edit'])->name('enderecos.edit');
    // Route::put('/{id}', [EnderecoController::class, 'update'])->name('enderecos.update');
    // Route::delete('/{id}', [EnderecoController::class, 'destroy'])->name('enderecos.destroy');
});


/**
 * Grupo de rotas para o CRUD de Usuários
 * Rotas para criar, editar, atualizar e excluir usuários
 */

Route::prefix('usuarios')->group(function () {
    //Rota para listar todos os Usuários, a Rota '/usuarios' agora vira '/' dentro do grupo 'usuarios'
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/criar', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/', [UsuarioController::class, 'store'])->name('usuarios.store');
});