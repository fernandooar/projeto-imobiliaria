<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Endereços</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #f4f4f4;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Lista de Endereços</h1>
    <a href="{{ route('enderecos.create') }}">Adicionar Novo Endereço</a>
    <hr>
    @if (count($enderecos) > 0)
    <ul>
        @foreach ($enderecos as $endereco)
        <li>
            {{ $endereco->endereco }}, {{ $endereco->numero }} - {{ $endereco->bairro ?? 'N/A' }}, {{ $endereco->cidade ?? 'N/A' }} ({{ $endereco->cep }})
            <p>Localização: {{ $endereco->localidade ?? 'Não informada' }}</p>
        </li>
        @endforeach
    </ul>
    @else
    <p>Nenhum endereço cadastrado ainda.</p>
    @endif
</body>

</html>