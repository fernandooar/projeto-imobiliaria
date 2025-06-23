<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de Usuários</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f8f9fa; color: #343a40; }
        h1 { color: #007bff; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        hr { border: 0; border-top: 1px solid #dee2e6; margin: 20px 0; }
        .success-message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        ul { list-style-type: none; padding: 0; }
        li { background: #ffffff; margin-bottom: 15px; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        li strong { color: #007bff; }
        li p { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <a href="{{ route('usuarios.create') }}">Adicionar Novo Usuário</a>
    <hr>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if (count($usuarios) > 0)
        <ul>
            @foreach ($usuarios as $usuario)
                <li>
                    <p><strong>ID:</strong> {{ $usuario->id }}</p>
                    <p><strong>Nome:</strong> {{ $usuario->nome_completo }}</p>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Telefone 1:</strong> {{ $usuario->telefone1 ?? 'N/A' }} ({{ $usuario->telefone1_whatsapp ? 'WhatsApp' : 'Não WhatsApp' }})</p>
                    @if ($usuario->telefone2)
                        <p><strong>Telefone 2:</strong> {{ $usuario->telefone2 }} ({{ $usuario->telefone2_whatsapp ? 'WhatsApp' : 'Não WhatsApp' }})</p>
                    @endif
                    <p><strong>CPF:</strong> {{ $usuario->cpf }}</p>
                    <p><strong>RG:</strong> {{ $usuario->rg ?? 'N/A' }} {{ $usuario->orgao_emissor ? '(' . $usuario->orgao_emissor . ')' : '' }}</p>
                    <p><strong>Data Nasc.:</strong> {{ $usuario->data_nascimento ? $usuario->data_nascimento->format('d/m/Y') : 'N/A' }}</p>
                    <p><strong>Estado Civil:</strong> {{ $usuario->estado_civil ?? 'N/A' }}</p>
                    <p><strong>Profissão:</strong> {{ $usuario->profissao ?? 'N/A' }}</p>
                    <p><strong>Empresa:</strong> {{ $usuario->empresa ?? 'N/A' }}</p>
                    <p><strong>Cargo:</strong> {{ $usuario->cargo ?? 'N/A' }}</p>
                    <p><strong>Salário:</strong> {{ $usuario->salario ?? 'N/A' }}</p>
                    <p><strong>CEP (Usuário):</strong> {{ $usuario->cep ?? 'N/A' }}</p>
                    <p><strong>CRECI:</strong> {{ $usuario->creci ?? 'N/A' }}</p>
                    <p><strong>Foto URL:</strong> {{ $usuario->foto_url ?? 'N/A' }}</p>
                    <p><strong>Matrícula:</strong> {{ $usuario->matricula ?? 'N/A' }}</p>
                    <p><strong>Tipo:</strong> {{ ucfirst($usuario->tipo_usuario) }}</p>
                    <p><strong>Nível Acesso:</strong> {{ $usuario->nivel_acesso }}</p>
                    <p><strong>Ativo:</strong> {{ $usuario->ativo ? 'Sim' : 'Não' }}</p>
                    <p><strong>Receber E-mail:</strong> {{ $usuario->receber_email ? 'Sim' : 'Não' }}</p>
                    <p><strong>Receber SMS:</strong> {{ $usuario->receber_sms ? 'Sim' : 'Não' }}</p>
                    <p><strong>Receber WhatsApp:</strong> {{ $usuario->receber_whatsapp ? 'Sim' : 'Não' }}</p>
                    @if ($usuario->instagram) <p><strong>Instagram:</strong> <a href="{{ $usuario->instagram }}" target="_blank">{{ $usuario->instagram }}</a></p> @endif
                    @if ($usuario->facebook) <p><strong>Facebook:</strong> <a href="{{ $usuario->facebook }}" target="_blank">{{ $usuario->facebook }}</a></p> @endif
                    @if ($usuario->twitter) <p><strong>Twitter:</strong> <a href="{{ $usuario->twitter }}" target="_blank">{{ $usuario->twitter }}</a></p> @endif
                    @if ($usuario->linkedin) <p><strong>LinkedIn:</strong> <a href="{{ $usuario->linkedin }}" target="_blank">{{ $usuario->linkedin }}</a></p> @endif

                    @if ($usuario->imobiliaria)
                        <p><strong>Imobiliária:</strong> {{ $usuario->imobiliaria->nome_fantasia }} (ID: {{ $usuario->imobiliaria->id }})</p>
                    @endif
                    @if ($usuario->endereco)
                        <p><strong>Endereço Principal:</strong> {{ $usuario->endereco->endereco }}, {{ $usuario->endereco->numero }} (ID: {{ $usuario->endereco->id }})</p>
                    @endif
                    <p><strong>Criado em:</strong> {{ $usuario->created_at ? $usuario->created_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                    <p><strong>Atualizado em:</strong> {{ $usuario->updated_at ? $usuario->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum usuário cadastrado ainda.</p>
    @endif
</body>
</html>