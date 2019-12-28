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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'PagesController@products')->name('products');
Route::get('/olovke', 'PagesController@olovke')->name('olovke');
Route::get('/kistovi', 'PagesController@kistovi')->name('kistovi');
Route::get('/platna', 'PagesController@platna')->name('platna');

Route::get('/about', 'PagesController@about')->name('about');

// AUTH

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN PANEL

Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->middleware('can:manage-products')->group(function(){
    Route::resource('/products', 'ProductsController');
});
Route::namespace('Adminpanel')->prefix('adminpanel')->name('adminpanel.')->group(function(){
    Route::resource('/categories', 'CategoriesController');
});

// OLD ADMIN PANEL ROUTES

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-products')->group(function(){
    Route::resource('/products', 'ProductsController');
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/categories', 'CategoriesController');
});

