
## Client repository

https://github.com/GSabadini/client-vue-auth

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
Docker and docker-compose
```

### Installing

Step by step

```
docker-compose up -d
```

```
docker-compose exec devapp bash
```

```
composer install
```

```
create .env through env.example
```

```
php artisan migrate --seed
```

## Running the tests

```
docker-compose exec devapp bash
```
All tests

```
vendor/bin/phpunit 
```

