# Projeto PI - Univesp - API AFRAPE

## Consumir a API

### Users

#### Exibir e Filtrar (GET)

Busca todos os usuários
```sh
http://localhost/users
```

Busca um usuário pelo UUID
```sh
http://localhost/users/9e6ad5cf-442d-40b9-9d8d-f3c0e577e13e
```

Filtra usuários por termos
```sh
http://localhost/users?filter=Bruno
```

Seta o total de usuário por página
```sh
http://localhost/users?total_per_page=5
```

Filtra usuário por termo e seta o total de usuário por página
```sh
http://localhost/users?filter=Bruno&&total_per_page=1
```

#### Cadastrar (POST)

Cadastra o usuário passando um JSON válido
```sh
http://localhost/users
```

```json
//Modelo de JSON
{
    "name": "Nome do Usuário",
    "email": "Email Válido do Usuário",
    "password": "Senha do Usuário"
}
```

#### Atualizar (PUT)

Atualiza o usuário passando um JSON válido
```sh
http://localhost/users/9e692360-ba82-436f-8534-43363021ca7e
```

```json
//modelo de JSON
//Não é obrigatório passar o password
{
    "name": "Nome do Usuário",
    "password": "Senha do Usuário"
}
```










Acessar o projeto
[http://localhost](http://localhost)
