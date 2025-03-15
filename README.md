# Projeto PI - Univesp - API AFRAPE

Projeto desenvolvido para uma entidade do terceiro setor como exigência do Projeto Integrador da UNIVESP - Polo Botucatu

Utilizado os seguintes padrões no desenvolvimento da API backend
- API RESTfull
- UUID


## Consumir a API

### Authentication

#### Login

Logar e gerar token da API

```sh
http://localhost/auth
```

```json
{
    "email": "email@email.com",
    "password": "Senha do Usuário",
    "device_name": "Disposito do Usuário"
}
```

#### Exibir dados do usuário

Retornar os dados do usuário logado

```sh
http://localhost/me
```

#### Logout

Deletar o token do usuário logado (Logout)

```sh
http://localhost/logout
```


### Users

#### Exibir e Filtrar (GET)

Buscar todos os usuários
```sh
http://localhost/users
```

Buscar um usuário pelo UUID
```sh
http://localhost/users/9e6ad5cf-442d-40b9-9d8d-f3c0e577e13e
```

Filtrar usuários por termos
```sh
http://localhost/users?filter=Bruno
```

Setar o total de usuários por página
```sh
http://localhost/users?total_per_page=5
```

Filtrar usuários por termo e setar o total de usuários por página
```sh
http://localhost/users?filter=Bruno&&total_per_page=1
```

#### Cadastrar (POST)

Cadastrar o usuários passando um JSON válido
```sh
http://localhost/users
```

```json
//Modelo de JSON
{
    "name": "Nome do Usuário",
    "email": "Email Válido do Usuário", //e-mail é único no banco
    "password": "Senha do Usuário"
}
```

#### Atualizar (PUT)

Atualizar o usuário passando um JSON válido
```sh
http://localhost/users/9e692360-ba82-436f-8534-43363021ca7e
```

```json
//modelo de JSON
{
    "name": "Nome do Usuário",
    "password": "Senha do Usuário" //Não é obrigatório passar o password
}
```

#### Deletar (DELETE)

Deletar o usuário passando o UUID
```sh
http://localhost/users/9e692360-ba82-436f-8534-43363021ca7e
```









Acessar o projeto
[http://localhost](http://localhost)
