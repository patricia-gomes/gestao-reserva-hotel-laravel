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

//Site
Route::get('/', 'Site\HomeController@index');
Route::get('/login', function() {
	echo 'É a pagina de Login!';
})->name('login');


//Admin
Route::prefix('/admin')->group(function() {

	Route::get('/', 'Admin\HomeController@index')->middleware('auth');
	Route::get('info', 'Admin\HomeController@info');
});