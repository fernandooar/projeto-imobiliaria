<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f8f9fa; color: #343a40; }
        h1 { color: #007bff; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        hr { border: 0; border-top: 1px solid #dee2e6; margin: 20px 0; }
        form { background-color: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        form div { margin-bottom: 5px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="tel"], input[type="password"], input[type="number"], input[type="date"], select {
            width: calc(100% - 16px); padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;
        }
        input[type="checkbox"] { margin-right: 5px; }
        button {
            grid-column: 1 / -1; /* Ocupa as duas colunas */
            padding: 12px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;
            font-size: 16px;
        }
        button:hover { background-color: #218838; }
        .error { color: #dc3545; font-size: 0.875em; margin-top: 3px; }
        .form-group-checkbox { display: flex; align-items: center; margin-bottom: 10px; }
        .form-group-checkbox label { margin-bottom: 0; font-weight: normal; }
    </style>
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>
    <a href="{{ route('usuarios.index') }}">Voltar para a Lista</a>
    <hr>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required value="{{ old('nome_completo') }}">
            @error('nome_completo') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            @error('senha') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="senha_confirmation">Confirmar Senha:</label>
            <input type="password" id="senha_confirmation" name="senha_confirmation" required>
            @error('senha_confirmation') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="telefone1">Telefone 1:</label>
            <input type="tel" id="telefone1" name="telefone1" value="{{ old('telefone1') }}">
            <div class="form-group-checkbox">
                <input type="checkbox" id="telefone1_whatsapp" name="telefone1_whatsapp" value="1" {{ old('telefone1_whatsapp') ? 'checked' : '' }}>
                <label for="telefone1_whatsapp">É WhatsApp?</label>
            </div>
            @error('telefone1') <div class="error">{{ $message }}</div> @enderror
            @error('telefone1_whatsapp') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="telefone2">Telefone 2:</label>
            <input type="tel" id="telefone2" name="telefone2" value="{{ old('telefone2') }}">
            <div class="form-group-checkbox">
                <input type="checkbox" id="telefone2_whatsapp" name="telefone2_whatsapp" value="1" {{ old('telefone2_whatsapp') ? 'checked' : '' }}>
                <label for="telefone2_whatsapp">É WhatsApp?</label>
            </div>
            @error('telefone2') <div class="error">{{ $message }}</div> @enderror
            @error('telefone2_whatsapp') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="endereco_id">Endereço (ID):</label>
            <select id="endereco_id" name="endereco_id">
                <option value="">Selecione um Endereço</option>
                @foreach($enderecos as $endereco)
                    <option value="{{ $endereco->id }}" {{ old('endereco_id') == $endereco->id ? 'selected' : '' }}>
                        {{ $endereco->endereco }}, {{ $endereco->numero }} - {{ $endereco->bairro ?? '' }} ({{ $endereco->cep }})
                    </option>
                @endforeach
            </select>
            @error('endereco_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required value="{{ old('cpf') }}">
            @error('cpf') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="rg">RG:</label>
            <input type="text" id="rg" name="rg" value="{{ old('rg') }}">
            @error('rg') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="orgao_emissor">Órgão Emissor (RG):</label>
            <input type="text" id="orgao_emissor" name="orgao_emissor" value="{{ old('orgao_emissor') }}">
            @error('orgao_emissor') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}">
            @error('data_nascimento') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="estado_civil">Estado Civil:</label>
            <input type="text" id="estado_civil" name="estado_civil" value="{{ old('estado_civil') }}">
            @error('estado_civil') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="profissao">Profissão:</label>
            <input type="text" id="profissao" name="profissao" value="{{ old('profissao') }}">
            @error('profissao') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" value="{{ old('empresa') }}">
            @error('empresa') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}">
            @error('cargo') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="salario">Salário:</label>
            <input type="text" id="salario" name="salario" value="{{ old('salario') }}">
            @error('salario') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="cep">CEP (do usuário):</label>
            <input type="text" id="cep" name="cep" value="{{ old('cep') }}">
            @error('cep') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="creci">CRECI (apenas para corretores):</label>
            <input type="text" id="creci" name="creci" value="{{ old('creci') }}">
            @error('creci') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="foto_url">URL da Foto (opcional):</label>
            <input type="text" id="foto_url" name="foto_url" value="{{ old('foto_url') }}">
            @error('foto_url') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="matricula">Matrícula (apenas para funcionários):</label>
            <input type="text" id="matricula" name="matricula" value="{{ old('matricula') }}">
            @error('matricula') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="tipo_usuario">Tipo de Usuário:</label>
            <select id="tipo_usuario" name="tipo_usuario" required>
                <option value="">Selecione o Tipo</option>
                <option value="administrador" {{ old('tipo_usuario') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="corretor" {{ old('tipo_usuario') == 'corretor' ? 'selected' : '' }}>Corretor</option>
                <option value="cliente" {{ old('tipo_usuario') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="proprietario" {{ old('tipo_usuario') == 'proprietario' ? 'selected' : '' }}>Proprietário</option>
                <option value="locatario" {{ old('tipo_usuario') == 'locatario' ? 'selected' : '' }}>Locatário</option>
                <option value="funcionario" {{ old('tipo_usuario') == 'funcionario' ? 'selected' : '' }}>Funcionário</option>
            </select>
            @error('tipo_usuario') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="nivel_acesso">Nível de Acesso (para funcionários):</label>
            <input type="number" id="nivel_acesso" name="nivel_acesso" value="{{ old('nivel_acesso') ?? 1 }}">
            @error('nivel_acesso') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group-checkbox">
            <input type="checkbox" id="ativo" name="ativo" value="1" {{ old('ativo', 1) ? 'checked' : '' }}>
            <label for="ativo">Usuário Ativo?</label>
            @error('ativo') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group-checkbox">
            <input type="checkbox" id="receber_email" name="receber_email" value="1" {{ old('receber_email', 1) ? 'checked' : '' }}>
            <label for="receber_email">Receber E-mail?</label>
            @error('receber_email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group-checkbox">
            <input type="checkbox" id="receber_sms" name="receber_sms" value="1" {{ old('receber_sms') ? 'checked' : '' }}>
            <label for="receber_sms">Receber SMS?</label>
            @error('receber_sms') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group-checkbox">
            <input type="checkbox" id="receber_whatsapp" name="receber_whatsapp" value="1" {{ old('receber_whatsapp') ? 'checked' : '' }}>
            <label for="receber_whatsapp">Receber WhatsApp?</label>
            @error('receber_whatsapp') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="instagram">Instagram URL:</label>
            <input type="text" id="instagram" name="instagram" value="{{ old('instagram') }}">
            @error('instagram') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="facebook">Facebook URL:</label>
            <input type="text" id="facebook" name="facebook" value="{{ old('facebook') }}">
            @error('facebook') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="twitter">Twitter URL:</label>
            <input type="text" id="twitter" name="twitter" value="{{ old('twitter') }}">
            @error('twitter') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="linkedin">LinkedIn URL:</label>
            <input type="text" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
            @error('linkedin') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="imobiliaria_id">Imobiliária (ID - se funcionário):</label>
            <select id="imobiliaria_id" name="imobiliaria_id">
                <option value="">Selecione uma Imobiliária</option>
                @foreach($imobiliarias as $imobiliaria)
                    <option value="{{ $imobiliaria->id }}" {{ old('imobiliaria_id') == $imobiliaria->id ? 'selected' : '' }}>
                        {{ $imobiliaria->nome_fantasia }} ({{ $imobiliaria->cnpj }})
                    </option>
                @endforeach
            </select>
            @error('imobiliaria_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Cadastrar Usuário</button>
    </form>
</body>
</html>