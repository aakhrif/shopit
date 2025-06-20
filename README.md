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


curl -Uri "http://localhost:8000/api/products" `
    -Method POST `
    -Headers @{"Content-Type"="application/json"} `
    -Body '{"name":"Test", "price": 9.99}' `
    -Verbose


curl -Uri "http://localhost:8000/api/test-image-validation" `
    -Method POST `
    -Headers @{"Content-Type"="application/json"} `
    -Body '{"name":"Test"}' `
    -Verbose

curl -Uri "http://localhost:8000/api/products" `
     -Method POST `
     -Headers @{"Content-Type"="application/json"} `
     -Body '{"name":"Test", "price": 9.99, "image": "product2.jpg", "sizes": ["S","M","L"], "description": "nicest shirts"}' `
     -Verbose


