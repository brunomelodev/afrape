# Projeto PI - Univesp - API AFRAPE

Projeto desenvolvido para uma entidade do terceiro setor como exigência do Projeto Integrador da UNIVESP - Polo Botucatu

Utilizado os seguintes padrões no desenvolvimento da API backend

-   API RESTfull
-   UUID

## Instalando a API

Iniciar o Docker Compose

```sh
docker compose up -d --build
```

Entrar no container

```sh
docker exec -it <nome_do_container> bash
```

Rodar o composer dentro do container

```sh
composer install
```

Migrar o banco laravel

```sh
php artisan migrate:fresh
```

## Consumir a API

### Authentication

#### Login

Logar e gerar token da API

```sh
http://localhost/auth
```

```json
//Modelo envio de JSON
{
    "email": "email@email.com",
    "password": "Senha do 'User'",
    "device_name": "Disposito do 'User'"
}
```

#### Exibir dados do 'user'

Retornar os dados do 'user' logado

```sh
http://localhost/me
```

#### Logout

Deletar o token do 'user' logado (Logout)

```sh
http://localhost/logout
```

### Users

#### Exibir e Filtrar Users (GET)

Buscar todos os 'users'

```sh
http://localhost/users
```

Buscar um 'users' pelo UUID

```sh
http://localhost/users/9e6ad5cf-442d-40b9-9d8d-f3c0e577e13e
```

Filtrar 'users' por termos

```sh
http://localhost/users?filter=Bruno
```

Setar o total de 'users' por página

```sh
http://localhost/users?total_per_page=5
```

Filtrar 'users' por termo e setar o total de 'users' por página

```sh
http://localhost/users?filter=Bruno&&total_per_page=1
```

#### Cadastrar User (POST)

Cadastrar o 'user' passando um JSON válido

```sh
http://localhost/users
```

```json
//Modelo envio de JSON
{
    "name": "Nome do 'User'",
    "email": "Email Válido do 'User'", //e-mail é único no banco
    "password": "Senha do 'User'"
}
```

#### Atualizar User (PUT)

Atualizar o 'user' passando um JSON válido

```sh
http://localhost/users/9e692360-ba82-436f-8534-43363021ca7e
```

```json
//Modelo envio de JSON
{
    "name": "Nome do 'User'",
    "password": "Senha do 'User'" //Não é obrigatório passar o password
}
```

#### Deletar (DELETE)

Deletar o 'user' passando o UUID

```sh
http://localhost/users/9e692360-ba82-436f-8534-43363021ca7e
```

### School

#### Exibir e Filtrar (GET)

Buscar todos as 'schools'

```sh
http://localhost:3000/schools
```

Filtrar 'schools' por termo e setar o total de 'schools' por página

```sh
http://localhost:3000/schools?filter=exemplo&total_per_page=1
```

Buscar todas as 'schools' com endereços (pode ser mesclado com demais filtros)

```sh
http://localhost:3000/schools?address=true
```

Buscar primeira 'school' (só haverá uma cadastra)

```sh
http://localhost:3000/schools/first/
```

#### Cadastrar School (POST)

Cadastrar a 'school' passando um JSON válido

```sh
http://localhost/schools
```

```json
//Modelo envio de JSON
{
    "name": "Nome",
    "cnpj": "00000000000000", // 14 digitos
    "address": {
        "street": "Rua Exemplo",
        "number": "123",
        "complement": "Apartamento 101",
		"neighborhood": "Bairro",
		"city": "Cidade",
		"state": "SP",
		"postal_code": "00000000" // 08 digitos
    }
}
```







Acessar o projeto
[http://localhost](http://localhost)
