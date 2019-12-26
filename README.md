# RWA Project (Laravel v6.0)

**Used**
- Xampp
- Composer
- NPM

##### Create database on localhost/phpmyadmin

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

# Project functionalities

#### User management
**Functionalities made**
- edit user details
- assign a role to user
- delete a user

**TO-DO**
- Moderator can't see the admin checkbox in the edit user option

#### Product management
**Functionalities made**
- edit product details
- delete a product
- products that contain name, price, details and image
- functionality to add products

**Things to make**
- categories