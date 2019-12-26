# RWA Project (Laravel v6.0)

**How to use this project on your machine**

- Clone this project from github
- Rename `.env.example` file to `.env` inside your project root and fill the database information.
- Open the console and cd your project root directory
- Run `composer install`
- Run `php artisan key:generate` 
- Before you migrate you should create a database with the name set in your `.env` file
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders
- Run `php artisan serve`


# Project functionalities

## Admin dashboard

# Project functionalities

#### User management
**Functionalities made**
- edit user details
- assign a role to user
- delete a user
- moderator can edit only name and email (can't see roles)

#### Product management
**Functionalities made**
- edit product details
- delete a product
- products that contain name, price, details and image
- functionality to add products

#### Category management
**Functionalities made**
- edit category name
- add new category


**TO-DO**
`//Product management`
- display current category in `admin.products.edit`

`//Product display`
- display products by their category in `products.blade.php`

`//Cart`
- create a cart
- option to add products to cart with sum displayed

- FRONTEND

