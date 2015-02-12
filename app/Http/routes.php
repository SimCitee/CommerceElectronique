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

Route::get('/', 'WelcomeController@index');

Route::get('/admin', function()
{
	return view('app');
});

Route::group(array('namespace' => 'Admin'), function()
{
	Route::resource('admin/users', 'UsersController');
});


Route::resource('admin/group', 'GroupsController');
Route::resource('admin/products', 'ProductsController');
Route::resource('admin/productCategories', 'ProductCategoriesController');
Route::resource('admin/tags', 'TagsController');
Route::resource('admin/taxes', 'TaxesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controllers([
	'admin/auth' => 'Admin\AdminAuthController'
]);