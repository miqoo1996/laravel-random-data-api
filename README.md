Laravel Framework 10.x & PHP 8.1.1
-----

Docker Installation Instruction
--------------------------

1. cp .env.example .env
2. *Optional*: Configure .env .
3. docker compose up --build -d
4. docker-compose exec php php artisan key:generate
5. open http://127.0.0.1/api/users
6. php artisan test

Manual Installation Instruction
--------------------------

1. composer install
2. cp .env.example .env
3. *Optional*: Configure .env .
4. php artisan key:generate
5. php artisan serve
6. open http://127.0.0.1:8000/api/users
7. php artisan test
