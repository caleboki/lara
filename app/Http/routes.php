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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('greeting', function () {
    return view('about', array('names'=>array('Caleb','Joshua')));
});

Route::get('blade', function () {
    return view('child');
});

Route::get('test', 'PagesController@test');

Route::get('home', function () {
    return view('welcome');
});
/*
Route::get('articles', 'ArticlesController@index');

Route::get('articles/create', 'ArticlesController@create');

Route::get('articles/{id}', 'ArticlesController@show');

Route::post('articles', 'ArticlesController@store');

Route::get('articles/{id}/edit', 'ArticlesController@edit'); */

Route::resource('articles', 'ArticlesController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('foo', ['middleware'=> 'manager', function()
{
	return 'this page may only be viewed by managers';
}
]);



