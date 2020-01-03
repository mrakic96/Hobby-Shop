<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// WEB PAGES

/*Main view route*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*Shopping cart routes*/
// Route::get('/cart', 'PagesController@getCart')->middleware('can:only-logged-user-see')->name('cart');
Route::get('/cart', 'PagesController@getCart')->name('cart');
Route::get('/addToCart/{id}', 'PagesController@getAddToCart')->name('addToCart');
Route::get('/add/{id}', 'PagesController@getAddByOne')->name('productAddByOne');
Route::get('/reduce/{id}', 'PagesController@getReduceByOne')->name('productReduceByOne');
Route::get('/remove/{id}', 'PagesController@getRemoveItem')->name('productRemove');
Route::get('/checkout', 'PagesController@getCheckout')->name('checkout');
Route::get('/finished-checkout', 'PagesController@getFinishedCheckout')->name('finishedCheckout');

/*Product views routes*/
Route::get('/products', 'PagesController@products')->name('products');
Route::get('/products/{id}', 'PagesController@product')->name('single.product');
Route::get('/olovke', 'PagesController@olovke')->name('olovke');
Route::get('/kistovi', 'PagesController@kistovi')->name('kistovi');
Route::get('/platna', 'PagesController@platna')->name('platna');

/*User profile*/
Route::get('/profile', 'PagesController@getProfile')->name('profile');
Route::get('/profile/{id}', 'PagesController@getEditProfile')->name('edit-profile');
Route::put('/profile/{user}', 'PagesController@getUpdateProfile')->name('update-profile');

/*About view route*/
Route::get('/about', 'PagesController@about')->name('about');

// SEARCH
Route::get('/search', 'PagesController@search')->name('search');

// AUTH

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN PANEL

/*Manage users routes*/
Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->middleware('can:manage-users')->group(function(){
    Route::get('/users/search', 'UsersController@search')->name('users.search');
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

/*Manage products routes*/
Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->middleware('can:manage-products')->group(function(){
    Route::get('/products/olovke', 'ProductsController@olovke')->name('products.olovke');
    Route::get('/products/kistovi', 'ProductsController@kistovi')->name('products.kistovi');
    Route::get('/products/platna', 'ProductsController@platna')->name('products.platna');
    Route::get('/products/search', 'ProductsController@search')->name('products.search');
    Route::resource('/products', 'ProductsController');
});

/*Manage categories routes*/
Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->middleware('can:manage-products')->group(function(){
    Route::get('/categories/search', 'CategoriesController@search')->name('categories.search');
    Route::resource('/categories', 'CategoriesController');
});

// OLD ADMIN PANEL ROUTES

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-products')->group(function(){
    Route::resource('/products', 'ProductsController');
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-products')->group(function(){
    Route::resource('/categories', 'CategoriesController');
});
