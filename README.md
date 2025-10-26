# LinkHub

![PHP Version](https://img.shields.io/badge/PHP-8.2.12-777BB4)
![Laravel Version](https://img.shields.io/badge/Laravel-12.35.1-FF2D20)
![License](https://img.shields.io/badge/License-MIT-blue.svg)

LinkHub é um projeto de gerenciador de links pessoais. Ele foi desenvolvido como um estudo prático de Laravel 12, focado em criar uma aplicação completa com backend robusto e um frontend moderno.

O sistema permite que usuários se cadastrem, gerenciem seus links e, opcionalmente, interajam com eles através de uma API RESTful protegida.

## 📋 Índice

- [Principais Funcionalidades](#principais-funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Como Executar o Projeto](#como-executar-o-projeto)
  - [Pré-requisitos](#pré-requisitos)
  - [Instalação](#instalação)
- [Documentação da API](#documentação-da-api)
- [Arquitetura e Padrões](#arquitetura-e-padrões)
- [Licença](#licença)

## Principais Funcionalidades

- **Autenticação de Usuários:** Sistema completo de registro e login.
- **Gerenciamento de Links:** Funcionalidades CRUD (Criar, Ler, Atualizar, Deletar) para os links do usuário.
- **API RESTful:** Endpoints de API (protegidos com Laravel Sanctum) para interações programáticas.
- **Design Responsivo:** Interface construída com a abordagem Mobile-First, garantindo usabilidade em desktops e celulares.
- **Validação de Dados:** Regras de validação robustas no backend para garantir a integridade dos dados.

## Tecnologias Utilizadas

O projeto foi construído com as seguintes ferramentas:

### Backend
- **PHP:** 8.2.12
- **Framework:** Laravel 12.35.1
- **Banco de Dados:** MySQL com Eloquent ORM
- **Autenticação:** Laravel Sanctum & Autenticação nativa do Laravel (com proteção CSRF)
- **Ferramentas:** Artisan CLI, Migrations, Eloquent Relationships

### Frontend
- **Template Engine:** Blade
- **Estilização:** Tailwind CSS (Utility-First)
- **Design:** CSS customizado com variáveis, efeitos de "Glass Morphism" (backdrop-filter) e gradientes.
- **Ícones & Fontes:** Font Awesome 6.4.0, Google Fonts (Inter)

## Como Executar o Projeto

Siga os passos abaixo para configurar o ambiente e executar o projeto localmente.

### Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js & NPM (ou Yarn)
- Um servidor de banco de dados (MySQL)

### Instalação

1.  **Clone o repositório:**
    ```sh
    git clone [https://github.com/joaoVGvieira/LinkHub.git](https://github.com/joaoVGvieira/LinkHub.git)
    cd LinkHub
    ```

2.  **Instale as dependências do PHP (Composer):**
    ```sh
    composer install
    ```

3.  **Instale as dependências do Node.js (NPM):**
    ```sh
    npm install
    ```

4.  **Configure seu ambiente:**
    (Copie o arquivo `.env.example` para `.env`)
    ```sh
    cp .env.example .env
    ```

5.  **Gere a chave da aplicação:**
    ```sh
    php artisan key:generate
    ```

6.  **Configure o Banco de Dados:**
    Abra seu arquivo `.env` e configure suas credenciais do MySQL:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=linkhub_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Execute as Migrations:**
    (Para criar as tabelas no banco de dados)
    ```sh
    php artisan migrate
    ```

8.  **Compile os Assets:**
    (Compile os arquivos Tailwind CSS e JavaScript)
    ```sh
    npm run dev
    ```

9.  **Inicie o servidor:**
    ```sh
    php artisan serve
    ```

Após esses passos, o projeto estará acessível em `http://localhost:8000`.

## Documentação da API

O projeto utiliza Laravel Sanctum para autenticação de API. Todos os endpoints estão prefixados com `/api/`.

| Método | URI | Ação |
| :--- | :--- | :--- |
| `GET` | `/api/links` | Lista todos os links do usuário autenticado. |
| `POST` | `/api/links` | Cria um novo link. |
| `GET` | `/api/links/{id}` | Mostra um link específico. |
| `PUT/PATCH` | `/api/links/{id}` | Atualiza um link. |
| `DELETE` | `/api/links/{id}` | Deleta um link. |

## Arquitetura e Padrões

- **MVC (Model-View-Controller)**: Separação clara de responsabilidades.
- **Resource Controllers**: Controllers otimizados para operações CRUD.
- **Middleware**: Utilizado para proteção de rotas e autenticação.
- **Eloquent ORM**: Mapeamento objeto-relacional para interações com o banco de dados.
- **Database Migrations**: Controle de versão do schema do banco de dados.
- **Form Request Validation**: Validação de dados desacoplada dos controllers.

## Licença

Distribuído sob a Licença MIT. Veja `LICENSE` para mais informações.