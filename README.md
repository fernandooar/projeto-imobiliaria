nando de # Sistema de Gestão Imobiliária

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer" />
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript" />
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" />
  <img src="https://img.shields.io/badge/Laragon-007FFF?style=for-the-badge&logo=laragon&logoColor=white" alt="Laragon" />
</p>

Este projeto é um sistema web em desenvolvimento para gestão de imóveis, imobiliárias e usuários, construído com o framework Laravel. Ele visa proporcionar uma plataforma completa para o controle de informações imobiliárias, desde o cadastro de imóveis até a gestão de clientes e corretores.

## 🚀 Tecnologias Utilizadas

* **Backend:** PHP 8.3+ com Laravel Framework 12.x
* **Banco de Dados:** MySQL
* **Gerenciamento de Dependências PHP:** Composer
* **Frontend:** HTML5, CSS3, JavaScript
* **Framework CSS/JS:** Bootstrap 5.3
* **Servidor Local:** Laragon (ambiente WAMP/LAMP completo)

# Sistema de Gestão Imobiliária

Este projeto é um sistema web em desenvolvimento para gestão de imóveis, imobiliárias e usuários, construído com o framework Laravel. Ele visa proporcionar uma plataforma completa para o controle de informações imobiliárias, desde o cadastro de imóveis até a gestão de clientes e corretores.

## 🚀 Tecnologias Utilizadas

* **Backend:** PHP 8.3+ com Laravel Framework 12.x
* **Banco de Dados:** MySQL
* **Gerenciamento de Dependências PHP:** Composer
* **Frontend:** HTML5, CSS3, JavaScript
* **Framework CSS/JS:** Bootstrap 5.3
* **Servidor Local:** Laragon (ambiente WAMP/LAMP completo)

## 📦 Instalação e Configuração

Siga os passos abaixo para configurar o ambiente e rodar o projeto localmente:

1.  **Pré-requisitos:**
    * Laragon (ou PHP 8.3+, Composer, MySQL manualmente instalados e configurados).
    * Um editor de código (ex: VS Code).

2.  **Clonar o Repositório (ou usar seu projeto existente):**
    Se este projeto for versionado no futuro, você o clonaria. Por enquanto, assumimos que você já tem a pasta do projeto.

3.  **Configuração do Ambiente (`.env`):**
    * Renomeie o arquivo `.env.example` para `.env` na raiz do projeto.
    * Abra o arquivo `.env` e configure as credenciais do banco de dados:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=gestao_imobiliaria_db # Ou o nome do seu banco de dados
        DB_USERNAME=root
        DB_PASSWORD= # Vazio se não houver senha no root do MySQL no Laragon
        ```
    * Configure a URL base da sua aplicação (se necessário, para que `APP_URL` aponte para o seu domínio local):
        ```dotenv
        APP_URL=[http://127.0.0.1:8000](http://127.0.0.1:8000)
        ```
    * Certifique-se de que `APP_KEY` esteja gerada. Se não estiver, execute `php artisan key:generate`.

4.  **Instalar Dependências PHP:**
    * Abra o Terminal do Laragon (ou VS Code na pasta do projeto).
    * Execute:
        ```bash
        composer install
        ```

5.  **Configurar o Banco de Dados e Popular Dados de Teste:**
    * Certifique-se de que o Laragon (MySQL e Apache/Nginx) está em execução.
    * **Crie o banco de dados `gestao_imobiliaria_db`** (ou o nome que você configurou no `.env`) via phpMyAdmin ou linha de comando.
    * Execute as migrações para criar as tabelas e os seeders para popular com dados de teste:
        ```bash
        php artisan migrate:fresh --seed
        ```

6.  **Limpar o Cache da Aplicação:**
    ```bash
    php artisan optimize:clear
    ```

7.  **Iniciar o Servidor de Desenvolvimento:**
    ```bash
    php artisan serve
    ```
    * Acesse `http://127.0.0.1:8000` (ou a URL fornecida pelo `php artisan serve`) no seu navegador.

## ⚙️ Estrutura do Banco de Dados (Schema Principal)

As principais tabelas do banco de dados e seus relacionamentos são:

* **`enderecos`**: Informações detalhadas sobre endereços.
* **`imobiliarias`**: Informações sobre as imobiliárias. (`endereco_id` FK para `enderecos`)
* **`usuarios`**: Informações sobre usuários do sistema (funcionários, clientes, etc.). (`endereco_id` FK para `enderecos`, `imobiliaria_id` FK para `imobiliarias`)
* **`imoveis`**: Detalhes dos imóveis. (`endereco_id` FK para `enderecos`)
* **`fotos_imoveis`**: URLs das fotos dos imóveis. (`imovel_id` FK para `imoveis`)

*(Para o schema SQL completo das tabelas, consulte os arquivos em `database/migrations/`)*

## ✨ Funcionalidades Implementadas

Até o momento, as seguintes funcionalidades foram implementadas:

* **Autenticação de Usuários:**
    * Login de usuários com verificação de credenciais (e-mail e senha hasheada).
    * Logout de usuários.
    * Redirecionamento pós-login para dashboards específicos com base no `tipo_usuario` e `nivel_acesso` (Administrador, Corretor, Funcionário, Cliente/Proprietário/Locatário).
    * Modal de Login na página inicial.
* **Gestão de Usuários (CRUD Básico - `create` e `read`):**
    * Cadastro público de novos usuários (com `tipo_usuario` padrão 'cliente' e `nivel_acesso` 4).
    * Listagem de todos os usuários cadastrados.
    * Validação de formulários com mensagens personalizadas.
    * Campos de `tipo_usuario` e `nivel_acesso` controlados (não alteráveis no cadastro público).
* **Gestão de Endereços (CRUD Básico - `create` e `read`):**
    * Cadastro de novos endereços.
    * Listagem de endereços.
* **Gestão de Imobiliárias (CRUD Básico - `create` e `read`):**
    * Cadastro de novas imobiliárias.
    * Listagem de imobiliárias.
* **Seeders:** População automática de dados de teste para `enderecos` e `imobiliarias`.
* **Layout Base:**
    * Layout principal da aplicação (`layouts/app.blade.php`) com navbar, footer e modal de login.
    * Layout básico para dashboards (`layouts/dashboard.blade.php`) com navbar, sidebar e área de conteúdo.

## 💡 Principais Abordagens e Decisões de Design

Durante o desenvolvimento, as seguintes abordagens e decisões foram tomadas para garantir a robustez, segurança e manutenibilidade do sistema:

* **Laravel Eloquent ORM:** Utilização de Models (`App\Models\Usuario`, `App\Models\Endereco`, etc.) para interação com o banco de dados, aproveitando seus recursos de relacionamentos e abstração de SQL.
* **Migrations:** Gestão do schema do banco de dados via migrações, permitindo controle de versão da estrutura do DB.
* **Seeders:** Utilização para popular o banco de dados com dados de teste de forma automatizada e consistente.
* **Validação de Requisições:** Validação de todos os dados de formulário no Controller (`$request->validate([...])`) para garantir a integridade dos dados e a segurança.
* **Autenticação e Autorização (Gates):**
    * Extensão da Model `Usuario` de `Illuminate\Foundation\Auth\User` (Authenticatable).
    * Utilização de `protected $casts = ['senha' => 'hashed']` para hashing automático de senhas (Laravel 10+).
    * Implementação de `public function getAuthPasswordName()` na Model `Usuario` para mapear a coluna `senha` do DB para a chave `password` do `Auth::attempt()`.
    * Configuração do `config/auth.php` para usar a Model `Usuario` e a coluna `senha` para autenticação.
    * Redirecionamento pós-login baseado em `tipo_usuario` e `nivel_acesso` do usuário logado.
    * Utilização de **Gates (via `AuthServiceProvider`)** para definir permissões de acesso a dashboards específicos (ex: `access-admin-dashboard`).
    * Campos sensíveis como `tipo_usuario` e `nivel_acesso` são protegidos via `$guarded` na Model e definidos manualmente no Controller para garantir que apenas a lógica de negócio os defina em cadastros públicos.
* **Componentização e Organização de Views:**
    * Uso de layouts Blade (`layouts/app.blade.php`, `layouts/dashboard.blade.php`) para reutilização de código e consistência visual.
    * Separação de CSS e JavaScript em arquivos externos (`public/css/main.css`, `public/js/main.js`, `public/css/dashboard.css`, `public/js/dashboard.js`).
    * Organização das views em pastas lógicas (`resources/views/auth`, `resources/views/usuarios`, `resources/views/dashboards`).

## 🗺️ Próximos Passos (Roadmap)

* **CRUD Completo para Imóveis:** Implementar todas as operações (criar, listar, visualizar, editar, excluir).
* **Upload de Fotos de Imóveis:** Gerenciar o upload e armazenamento de imagens.
* **CRUD Completo para Imobiliárias e Usuários:** Finalizar as operações de visualização, edição e exclusão.
* **Dashboard Detalhado:** Aprimorar os dashboards com dados e gráficos relevantes para cada tipo de usuário.
* **Gerenciamento de Transações (Locação/Venda):** Implementar lógica para registrar transações.
* **Pesquisa e Filtros:** Melhorar a funcionalidade de pesquisa de imóveis no frontend.
* **Implementação de Policies:** Para controle de acesso a ações mais granulares (ex: "corretor pode editar apenas seus próprios imóveis").

## 🤝 Autores:

Fernando Almeida
Linkedin: https://www.linkedin.com/in/fernandooar/
Weslei Cardoso
https://www.linkedin.com/in/weslei-cardoso-726930364/

