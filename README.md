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

**Sidenote**
- Stripe is used for our checkout form
- To finish test checkouts you need to set your Stripe account keys to `STRIPE_KEY` and `STRIPE_SECRET` in `.env` file
- Put your STRIPE_SECRET key in `js/checkout.js` on line 2 for card input to be displayed
- [Stripe keys info](https://stripe.com/docs/keys)

- Our mail configs are set to mailgun to test post-purchase mail affirmations
- We use [mailgun](https://mail.com/) api keys in our `.env` file
- Fields to fill in: `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAILGUN_DOMAIN`, `MAILGUN_SECRET`
- We have added our emails to mailgun: `aviskic@gmail.com`, `matej.rakic96@gmail.com`
- Transactions will be made if the emails above are used in checkout forms and environment settings are set accordingly

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

#### Transaction management

1. Display transactions:
    - `Both admin and moderator can see:`
    - id
    - billing_total
    - purchased item quantity
    - user_id
    - billing_name
    - billing_address
    - billing_city
    - `Admin can see:`
    - Delete button

2. Delete a transaction:
    - Admin can delete a transaction

## Application

`<!-- User profile -->`

#### 'profile' view

- Info about user that is currently logged in

#### 'purchases' view

- Display all user orders/transactions

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

- Basic info

`<!-- Shopping cart -->`

#### 'cart' view

- Option to add products to cart
- Option to increment and decrement single product amount
- Option to remove a product from cart
- Display a total sum a single product
- Display a total sum of products

#### 'checkout' view

- User is getting a checkout view after buying products
- Displayed form with input fields
- Guest is redirected to 'login' after trying to buy products




