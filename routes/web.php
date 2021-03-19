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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Site\HomeController@index');


Route::prefix('/admin')->group(function() {

	Route::get('/', 'Admin\HomeController@index');
	Route::get('info', 'Admin\InfoController@info');
});