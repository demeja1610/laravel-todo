# Laravel todo

Simple todo list made with laravel

Project was build as test assignment for [Nefis company](http://www.nefco.ru/)

# Requirements

1. [php ^7.3 | ^8.0](https://www.php.net/downloads)
2. [composer](https://getcomposer.org/download/)
3. [nodejs](https://nodejs.org/en/) (Project was tested with 12.14.0 version, you can use [NVM](https://www.google.com/search?q=nvm) for changing node version)

# Installation

1. Create database for this project
2. composer install
3. cp .env.example .env
4. Change DB_DATABASE, DB_USERNAME, DB_PASSWORD variables in .env file according to your credentials
5. php artisan migrate
6. php artisan db:seed
7. php artisan key:generate
8. npm i
9. npm run prod
10. php artisan serve
11. Open app at [127.0.0.1:8000](127.0.0.1:8000)

# Test user credentials
* Login - `admin@laraveltodo.com`
* Password - `password`
