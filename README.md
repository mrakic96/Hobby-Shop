**TO-DO**

- Fix frontend
- Create products in ProductsTableSeeder

`//Product management`
- display current category in `admin.products.edit`


# RWA Project (Laravel v6.x)

**How to use this project on your machine**

- Clone this project from github
- Rename `.env.example` file to `.env` inside your project root and fill the database information.
- Cart sessions don't work if you don't put `SESSION_DRIVER` equal to `file` in your `.env` file.
- Open the console and cd your project root directory
- Run `composer install`
- Run `php artisan key:generate` 
- Before you migrate you should create a database with the name set in your `.env` file
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders
- Run `php artisan serve`

## Admin panel

- Credentials

`admin@hobbyshop.com  password`

`moderator@hobbyshop.com  password`

`user@hobbyshop.com  password`

#### User management

1. Display users:
    - `Both admin and moderator can see:`
    - id
    - name
    - email
    - role
    - action button/s

2. Edit user details:
    - `Admin has permission to edit:`
    - email
    - name
    - assigned roles
    - `Moderator has permission to edit:`
    - email
    - name
3. Delete a user:
    - `Admin can delete a user.`
    - `Moderator *can't* delete a user.`


#### Product management

1. Display products:
    - `Both admin and moderator can see:`
    - id
    - name
    - price
    - image
    - action buttons

2. Edit product details:
    - `Both admin and moderator have permission to edit:`
    - name
    - details
    - description
    - price

3. Delete a product:
    - `Both admin and moderator can delete a product.`

4. Add a new product:
    - `Both admin and moderator can add a new product with:`
    - name
    - details
    - description
    - price
    - category
    - image

#### Category management

1. Display categories:
    - `Both admin and moderator can see:`
    - id
    - name
    - action button

2. Edit category name:
    - `Both admin and moderator can edit:`
    - name

3. Add new category:
    - `Both admin and moderator can add a new category with:`
    - name

## Application

`<!-- User profile -->`

#### 'profile' view

- Info about user that is currently logged in

#### 'edit-profile' view

- Option to edit user info

#### 'change-password' view

- Option to change user password

`<!-- Products -->`

#### 'products' view

- All products from DB are displayed 

#### '/sortbycategory/xxxx' views

- Products displayed by their category

#### '/sortbyprice/xxxx' views

- Products displayed by their price (asc or desc)

#### 'view_product' view

- A single product details are displayed

#### 'search-results' view

- This view is displayed after a user or a guest hits search button

`<!-- About us -->`

#### 'about' view

- basic info

`<!-- Shopping cart -->`

#### 'cart' view

- Option to add products to cart
- Option to increment and decrement single product amount
- Option to remove a product from cart
- Display a total sum a single product
- Display a total sum of products

#### 'checkout' view

- logged in user is getting a checkout view after buying products
- guest is redirected to 'login' after trying to buy products




