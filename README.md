# Projeto PI Univesp - AFRAPE


## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/brunomelodev/afrape.git afrape
```
```sh
cd afrape
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="AFRAPE"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost](http://localhost)
