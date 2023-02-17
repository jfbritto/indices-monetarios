# Setup Docker

### Passo a passo

Clone o Repositório

Suba os containers

```sh
docker-compose up -d
```

Acessar o container

```sh
docker-compose exec php bash
```

Instalar as dependências

```sh
composer update
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
