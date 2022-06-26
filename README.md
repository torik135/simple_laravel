# Laravel app

## Features:
1. Create, Read, Delete, and Likes
2. Register new user
3. Login user

## How to use:

1. ####clone / download this repo
2. ####create .env file and copy anything inside .env.example
3. ####create database and edit .env file until this lines fits your environment

``` env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=db_laravel 
DB_USERNAME=root
DB_PASSWORD=root
```

5. ####on the terminal / cmd
```bash
php artisan migrate
php artisan serve
```
6. ####click register & create user
7. ####on the terminal / cmd
```bash
php artisan db:seeder PostSeeder
```
