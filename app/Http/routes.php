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

Route::group(array('namespace' => 'Admin'), function()
{
	Route::resource('admin/users', 'UsersController');
	Route::get('/admin', 'AdminAuthController@getLogin');
});


Route::resource('admin/group', 'GroupsController');
Route::resource('admin/products', 'ProductsController');
Route::resource('admin/productCategories', 'ProductCategoriesController');
Route::resource('admin/tags', 'TagsController');
Route::resource('admin/taxes', 'TaxesController');

Route::controllers([
	'profile' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controllers([
	'admin/auth' => 'Admin\AdminAuthController'
]);