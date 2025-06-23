<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Endereço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 300px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <h1>Cadastrar Novo Endereço</h1>
    <a href="{{ route('enderecos.index') }}">Voltar para a Lista</a>
    <hr>

    <form action="{{ route('enderecos.store') }}" method="POST">
        @csrf {{-- ESSENCIAL para segurança no Laravel --}}

        <div>
            <label for="endereco">Endereço (Rua/Avenida):</label>
            <input type="text" id="endereco" name="endereco" required value="{{ old('endereco') }}">
            @error('endereco') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="{{ old('numero') }}">
            @error('numero') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="bloco">Bloco:</label>
            <input type="text" id="bloco" name="bloco" value="{{ old('bloco') }}">
            @error('bloco') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="andar">Andar:</label>
            <input type="text" id="andar" name="andar" value="{{ old('andar') }}">
            @error('andar') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="sala">Sala:</label>
            <input type="text" id="sala" name="sala" value="{{ old('sala') }}">
            @error('sala') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="apartamento">Apartamento:</label>
            <input type="text" id="apartamento" name="apartamento" value="{{ old('apartamento') }}">
            @error('apartamento') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="{{ old('cep') }}">
            @error('cep') <div class="error">{{ $message }}</div> @enderror
        </div>


        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" value="{{ old('complemento') }}">
            @error('complemento') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="{{ old('bairro') }}">
            @error('bairro') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="{{ old('cidade') }}">
            @error('cidade') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="estado">Estado (UF):</label>
            <input type="text" id="estado" name="estado" maxlength="2" value="{{ old('estado') }}">
            @error('estado') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="localidade">Localidade (Descrição ou Geo):</label>
            <input type="text" id="localidade" name="localidade" value="{{ old('localidade') }}">
            @error('localidade') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Cadastrar Endereço</button>
    </form>
</body>

</html>