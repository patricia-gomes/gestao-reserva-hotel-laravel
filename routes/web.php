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
Route::prefix('/')->group(function() {
	Route::get('/', 'Site\HomeController@index');
});

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

	Route::get('/accommodations', 'Admin\RegisterAccommodationsController@accommodations')->name('admin.accommodations');//Lista todas as acomodações cadastradas
	Route::get('/form_accommodations', 'Admin\RegisterAccommodationsController@form_accommodations')->name('admin.form_accommodations');//Formulario de registro
	Route::post('/register_accommodations', 'Admin\RegisterAccommodationsController@register')->name('admin.register');

	Route::get('/calendar', 'Admin\CalendarController@index')->name('calendar');

	Route::get('/form_reservations', 'Admin\RegisterReservationsController@index')->name('form_reservations');
	Route::post('/register_reservations', 'Admin\RegisterReservationsController@register');

	Route::get('/reservations', 'Admin\ReservationsController@index')->name('reservations');

	Route::get('/form_guests', 'Admin\GuestsController@index')->name('form_guests');
	Route::post('/register_guests', 'Admin\GuestsController@register')->name('admin.register_guests');
	Route::get('/guests', 'Admin\GuestsController@guests')->name('guests');
	Route::get('/{id}/reservation_guest', 'Admin\GuestsController@guest')->name('admin.reservation_guest');
	Route::put('/{id}/register_reservation_guest', 'Admin\GuestsController@register_reservation_guest')->name('admin.register_reservation_guest');

});
Auth::routes();