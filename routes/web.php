<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('index');
});


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
