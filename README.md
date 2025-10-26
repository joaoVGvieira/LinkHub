# LinkHub 🚀

![PHP Version](https://img.shields.io/badge/PHP-8.2.12-777BB4)
![Laravel Version](https://img.shields.io/badge/Laravel-12.35.1-FF2D20)
![License](https://img.shields.io/badge/License-MIT-blue.svg)

Um gerenciador de links moderno e responsivo, construído com a robustez do Laravel 12 e um design frontend arrojado usando Tailwind CSS e efeitos de Glass Morphism.

Este projeto demonstra a implementação de um CRUD completo, autenticação via Laravel Sanctum e uma API RESTful, tudo envolto em uma interface de usuário interativa e visualmente atraente.

## 🎨 Visualização


![Exemplo de screenshot do projeto](gif\gif.gif)

## 📋 Índice

- [✨ Funcionalidades Principais](#-funcionalidades-principais)
- [🛠️ Stack de Tecnologias](#️-stack-de-tecnologias)
- [🚀 Começando](#-começando)
  - [Pré-requisitos](#pré-requisitos)
  - [Instalação](#instalação)
- [🔌 Endpoints da API (Exemplo)](#-endpoints-da-api-exemplo)
- [🏛️ Arquitetura e Padrões](#️-arquitetura-e-padrões)
- [📄 Licença](#-licença)

## ✨ Funcionalidades Principais

- **Autenticação Segura:** Sistema completo de login e registro com Laravel Auth e Sanctum.
- **CRUD Completo:** Gerenciamento total (Criar, Ler, Atualizar, Deletar) de links.
- **API RESTful:** Endpoints de API para gerenciar os links de forma programática.
- **Design Moderno:** Interface com efeito "Glass Morphism", gradientes animados e tipografia moderna (Google Fonts - Inter).
- **Totalmente Responsivo:** Design Mobile-First que se adapta perfeitamente a qualquer tamanho de tela.
- **Validação Robusta:** Validação de formulários customizada no backend e frontend.
- **UI Interativa:** Animações suaves de hover/focus e elementos interativos.

## 🛠️ Stack de Tecnologias

Esta é a stack completa utilizada no projeto:

### Backend
- **PHP:** 8.2.12
- **Framework:** Laravel 12.35.1
- **Banco de Dados:** MySQL com Eloquent ORM
- **Autenticação:** Laravel Sanctum & Auth (com CSRF Protection)
- **Ferramentas:** Artisan CLI, Migrations, Eloquent Relationships

### Frontend
- **Template Engine:** Blade
- **Estilização:** Tailwind CSS (Utility-First)
- **Design:** CSS Custom com Variáveis, Efeitos Glass (backdrop-filter)
- **Ícones & Fontes:** Font Awesome 6.4.0, Google Fonts (Inter)

## 🚀 Começando

Siga estas instruções para obter uma cópia local do projeto em funcionamento.

### Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js & NPM (ou Yarn)
- Um servidor de banco de dados (MySQL)

### Instalação

1.  **Clone o repositório:**
    ```sh
    git clone [https://github.com/joaoVGvieira/LinkHub.git)
    cd linkhub
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
    Copie o arquivo de exemplo `.env.example` para `.env`.
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
    DB_DATABASE=nome_do_seu_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```

7.  **Execute as Migrations:**
    Para criar as tabelas no banco de dados.
    ```sh
    php artisan migrate
    ```

8.  **Compile os Assets:**
    Compile os arquivos Tailwind CSS e JavaScript.
    ```sh
    npm run dev
    ```

9.  **Inicie o servidor:**
    ```sh
    php artisan serve
    ```

Agora você pode acessar o projeto em `http://localhost:8000`!

## 🔌 Endpoints da API (Exemplo)

O projeto utiliza Laravel Sanctum para autenticação de API. Todos os endpoints estão prefixados com `/api/`.

| Método | URI | Ação |
| :--- | :--- | :--- |
| `GET` | `/api/links` | Lista todos os links do usuário autenticado. |
| `POST` | `/api/links` | Cria um novo link. |
| `GET` | `/api/links/{id}` | Mostra um link específico. |
| `PUT/PATCH` | `/api/links/{id}` | Atualiza um link. |
| `DELETE` | `/api/links/{id}` | Deleta um link. |

## 🏛️ Arquitetura e Padrões

- **MVC (Model-View-Controller)**: Separação clara de responsabilidades.
- **Resource Controllers**: Controllers otimizados para operações CRUD.
- **Middleware**: Utilizado para proteção de rotas e autenticação (Auth & Sanctum).
- **Eloquent ORM**: Mapeamento objeto-relacional para interações fluentes com o banco de dados.
- **Database Migrations**: Controle de versão do schema do banco de dados.
- **Form Request Validation**: Validação de dados de formulário desacoplada dos controllers.

## 📄 Licença

Distribuído sob a Licença MIT. Veja `LICENSE` para mais informações.
