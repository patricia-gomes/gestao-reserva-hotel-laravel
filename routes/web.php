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

	//Acomodaçao
	Route::get('/accommodations', 'Admin\RegisterAccommodationsController@accommodations')->name('admin.accommodations');//Lista todas as acomodações cadastradas
	Route::get('/form_accommodations', 'Admin\RegisterAccommodationsController@form_accommodations')->name('admin.form_accommodations');//Formulario de registro
	Route::post('/register_accommodations', 'Admin\RegisterAccommodationsController@register')->name('admin.register');
	Route::get('/accommodation/{id}/edit', 'Admin\RegisterAccommodationsController@edit')->name('admin.accommodation_edit');
	Route::put('/{id}/register_edit_accommodations', 'Admin\RegisterAccommodationsController@register_edit_accommodations')->name('admin.register_edit_accommodations');

	Route::get('/calendar', 'Admin\CalendarController@index')->name('calendar');

	//Reservas
	Route::get('/form_reservations', 'Admin\RegisterReservationsController@index')->name('form_reservations');
	Route::post('/register_reservations', 'Admin\RegisterReservationsController@register');
	Route::get('/reservations', 'Admin\ReservationsController@index')->name('reservations');
	Route::get('/reservation/{id}/edit', 'Admin\ReservationsController@edit')->name('admin.reservation_edit');
	Route::put('/{id}/edit_reservation', 'Admin\ReservationsController@register_edit')->name('admin.register_edit');

	//Hospedes
	Route::get('/form_guests', 'Admin\GuestsController@index')->name('form_guests');
	Route::post('/register_guests', 'Admin\GuestsController@register')->name('admin.register_guests');
	Route::get('/guests', 'Admin\GuestsController@guests')->name('guests');
	Route::get('/{id}/reservation_guest', 'Admin\GuestsController@guest')->name('admin.reservation_guest');
	Route::put('/{id}/register_reservation_guest', 'Admin\GuestsController@register_reservation_guest')->name('admin.register_reservation_guest');
	Route::get('/guest/{id}', 'Admin\GuestsController@edit')->name('admin.form_edit_guest');
	Route::put('/guest/{id}/edit_guest', 'Admin\GuestsController@register_edit')->name('admin.register_edit_guest');

	//Tipos
	Route::get('/types', 'Admin\TypesAccommodationsController@types')->name('types');
	Route::get('/form_types', 'Admin\TypesAccommodationsController@index')->name('admin.form_types');
	Route::post('/register_types', 'Admin\TypesAccommodationsController@register')->name('admin.register_types');
	Route::put('/form_edit_type/{id}', 'Admin\TypesAccommodationsController@edit')->name('admin.form_edit_type');
	Route::put('/edit_type/{id}', 'Admin\TypesAccommodationsController@register_edit')->name('admin.edit_type');
	Route::post('/delete_type/{id}', 'Admin\TypesAccommodationsController@delete')->name('admin.delete_type');

	//Entrada/saida
	Route::get('/entry_today', 'Admin\EntryExitTodayController@index')->name('admin.entry_today');
	Route::get('/exit_today', 'Admin\EntryExitTodayController@exit')->name('admin.exit_today');

	//Finaliza checkout
	Route::get('/checkout/{id}', 'Admin\CheckOutController@finish_guest')->name('admin.finish_guest');
	Route::get('/cancel/{id}/', 'Admin\ReservationsController@cancel')->name('admin.cancel');

	//Configuraçoes
	Route::get('/settings', 'Admin\SettingsController@index')->name('admin.settings');

});
Auth::routes();