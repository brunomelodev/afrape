# Projeto PI - Univesp - API AFRAPE

## Consumir a API

### Users

#### Filtros
```sh
http://localhost/users?filter=Rodolfo
```

```sh
http://localhost/users?total_per_page=5
```

#### Cadastrar (POST)
```sh
http://localhost/users
```

Enviar via post o json para cadastro
```json
{
    "name": "Nome do Usuário",
    "email": "Email Válido do Usuário",
    "password": "Senha do Usuário"
}
```


Acessar o projeto
[http://localhost](http://localhost)
