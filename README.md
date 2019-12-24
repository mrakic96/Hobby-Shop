# RWA Project (Laravel v6.0)

**Used**
-Xampp
-Composer
-NPM

### Create database on localhost/phpmyadmin

#### Create project
`composer create-project --prefer-dist laravel/laravel HobbyShop`

#### Update .env file
`DB_DATABASE=hobby_shop // Database name`

#### Create laravel AUTH and migrate tables
`composer require laravel/ui`

`php artisan ui vue --auth`

`php artisan migrate`

#### NPM
`npm install && npm run dev`

#### Create controller for admin
`php artisan make:controller \\Admin\\UsersController -r -mUser`



