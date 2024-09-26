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


Instale o Sail (Composer sendo executado direto no docker)
```sh
docker run --rm -v $(pwd):/app composer require laravel/sail --dev
```

```sh
docker run --rm -v $(pwd):/app php artisan sail:install
```


Suba os containers do projeto
```sh
./vendor/bin/sail up -d
```


Acesse o container
```sh
./vendor/bin/sail bash
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Rode as migration
```sh
php artisan migrate
```


Acesse e faça o registro inicial
[http://localhost/register](http://localhost/register)


Acesse o projeto
[http://localhost](http://localhost)
