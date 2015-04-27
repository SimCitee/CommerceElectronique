<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/search', 'UserSearchController@index');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::group(array('namespace' => 'Admin'), function()
{
	Route::resource('admin/users', 'UsersController');
	Route::resource('admin/products', 'ProductsController');
	Route::get('/admin', 'AdminAuthController@getLogin');
});

Route::resource('/products', 'ProductsController');
Route::resource('/boardGames', 'BoardGamesController');
Route::resource('/accessories', 'AccessoriesController');
Route::resource('/sales', 'SalesController');
Route::resource('admin/group', 'GroupsController');
Route::resource('admin/productCategories', 'ProductCategoriesController');
Route::resource('admin/tags', 'TagsController');
Route::resource('admin/taxes', 'TaxesController');

// Cart routes
Route::get('/cart', ['uses'=>'CartController@index']);
Route::post('/cart', ['as'=>'cart.destroy', 'uses'=>'CartController@destroy']);
Route::post('cart/{productId}', ['as'=>'cart.add', 'uses'=>'CartController@addItem']);
Route::put('cart/{rowId}', ['as'=>'cart.update', 'uses'=>'CartController@updateItem']);
Route::delete('cart/{rowId}', ['as'=>'cart.remove', 'uses'=>'CartController@removeItem']);

Route::controllers([
	'profile' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controllers([
	'admin/auth' => 'Admin\AdminAuthController'
]);