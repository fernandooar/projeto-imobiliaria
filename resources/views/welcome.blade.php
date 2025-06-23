<!-- resources/views/dashboard.blade.php -->
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Meu Painel de Controle</h1>

    {{-- Alerta de boas-vindas --}}
    <x-alert type="success" title="Bem-vindo!">
        <p>Olá, {{ Auth::user()->name }}! Seja bem-vindo ao seu painel.</p>
    </x-alert>

    {{-- Alerta de informações com rodapé --}}
    <x-alert type="info" title="Lembrete Importante">
        <p>Você tem 3 tarefas pendentes para hoje.</p>
        <x-slot name="footer">
            <a href="/tasks">Ver minhas tarefas</a>
        </x-slot>
    </x-alert>
@endsection