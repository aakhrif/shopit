# Projectname

Use case Shopsystem

# Perquesites

- PHP >= 8.2
- Composer
- Laravel 12.x

## bash

git clone https://github.com/aakhrif/shopit.git
composer install
cp .env.example .env

## start
php artisan serve

## test
php artisan test

### Integrationstest  (HTTP-Request → Routing → Controller → Model → DB)
(Linux)
curl -X POST http://localhost:8000/api/products \
     -H "Content-Type: application/json" \
     -d '{"name":"Test", "price": 9.99}'

(Windows)
curl.exe -X POST http://localhost:8000/api/products \
     -H "Content-Type: application/json" \
     -d '{"name":"Test", "price": 9.99}'


