```
$ cp .env.example .env
$ docker-compose build app
$ docker-compose run --rm app composer install
$ docker-compose run --rm app php artisan key:generate
$ docker-compose up app
```

# Command example
## Make Model
```
$ docker-compose run --rm app php artisan make:model Model -m
// -m is option that create migration file with.
```

## Migration
```
$ docker-compose run --rm app php artisan migrate
```
