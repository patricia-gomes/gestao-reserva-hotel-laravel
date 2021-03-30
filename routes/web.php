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


//Login
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');
//Deslogar
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//Registrar um novo usuário
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Admin
Route::prefix('/admin')->group(function() {

	Route::get('/', 'Admin\HomeController@index')->name('admin');
});
Auth::routes();

