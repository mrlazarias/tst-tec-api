# 📍 Places API

Uma API RESTful para gerenciamento de lugares, construída com Laravel 12 e PostgreSQL.

## 🚀 Funcionalidades

- ✅ **Criar** novos lugares
- 🔄 **Atualizar** informações de lugares
- 🔍 **Buscar** lugares específicos
- 📋 **Listar** todos os lugares
- 🔎 **Filtrar** lugares por nome
- 🧪 **100% de cobertura** de testes nas classes da aplicação

## 🧰 Tecnologias

- **Laravel 12** - Framework PHP moderno
- **PostgreSQL** - Banco de dados relacional
- **Docker** - Ambiente de desenvolvimento e produção
- **PHPUnit** - Framework de testes

## 📋 Estrutura de Dados

Cada lugar possui os seguintes atributos:

| Atributo   | Descrição                                       |
|------------|------------------------------------------------|
| `name`     | Nome do lugar                                  |
| `slug`     | Versão amigável para URL (gerada automaticamente) |
| `city`     | Cidade onde o lugar está localizado            |
| `state`    | Estado onde o lugar está localizado            |
| `created_at` | Data e hora de criação do registro           |
| `updated_at` | Data e hora da última atualização            |

## 🛠️ Configuração e Instalação

### Pré-requisitos

- Docker
- Docker Compose

### Instalação

1. Clone o repositório:
   ```bash
   git clone <repositório-url>
   cd <diretório-do-projeto>
   ```

2. Inicie os contêineres Docker:
   ```bash
   docker-compose up -d
   ```

3. Instale as dependências:
   ```bash
   docker-compose exec app composer install
   ```

4. Gere a chave da aplicação:
   ```bash
   docker-compose exec app php artisan key:generate
   ```

5. Execute as migrações:
   ```bash
   docker-compose exec app php artisan migrate
   ```

6. A API estará disponível em `http://localhost:8000/api`

## 🧪 Executando Testes

Execute a suíte de testes para garantir que tudo está funcionando corretamente:

```bash
docker-compose exec app php artisan test
```

Para gerar um relatório de cobertura (necessário Xdebug):

```bash
docker-compose exec app php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html coverage
```

## 📡 Endpoints da API

### Listar Lugares
```
GET /api/places
```
Parâmetros de consulta opcionais:
- `name` - Filtra lugares pelo nome

### Obter um Lugar Específico
```
GET /api/places/{id}
```

### Criar um Lugar
```
POST /api/places
```
Corpo da requisição:
```json
{
    "name": "Nome do Lugar",
    "city": "Nome da Cidade",
    "state": "Nome do Estado"
}
```

### Atualizar um Lugar
```
PUT /api/places/{id}
```
Corpo da requisição:
```json
{
    "name": "Nome Atualizado",
    "city": "Cidade Atualizada",
    "state": "Estado Atualizado"
}
```

### Excluir um Lugar
```
DELETE /api/places/{id}
```

## 🗄️ Acesso ao Banco de Dados

### PostgreSQL
- **Host**: localhost
- **Porta**: 5432
- **Banco de dados**: places_db
- **Usuário**: places_user
- **Senha**: places_password

### pgAdmin (Interface Web para PostgreSQL)
- **URL**: http://localhost:5050
- **Email**: admin@admin.com
- **Senha**: admin
