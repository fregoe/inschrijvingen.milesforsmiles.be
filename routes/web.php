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

/*
 * FRONT URL
 */

Route::get('/', 'InschrijvingsController@showInschrijving')->name('index');
Route::get('/bedankt-voor-uw-inschrijving', 'InschrijvingsController@showBedankt')->name('order.success');

Route::post('/submit-inschrijving', 'InschrijvingsController@submitInschrijving')->name('inschrijving.submit');
Route::post('/add-inschrijving', 'DeelnemersController@store');
Route::post('/edit-inschrijving', 'DeelnemersController@editFront');
Route::post('/update-inschrijving-front', 'DeelnemersController@updateFront');
Route::post('/remove-inschrijving', 'DeelnemersController@destroy');
Route::post('/update-inschrijving', 'DeelnemersController@update');
Route::post('/add-teamlid', 'TeamsController@addTeamlid');
Route::post('/remove-teamlid', 'TeamsController@removeTeamlid');

/*
 * PROTECTED URL's
 */

Route::prefix('mijn-account')->group(function(){
    Route::get('/', 'InschrijvingsController@mijnAccountIndex')->middleware('auth')->name('mijn-account.index');
    Route::get('/inschrijvingen', 'DeelnemersController@showInschrijvingen')->middleware('auth')->name('mijn-account.inschrijvingen');
    Route::get('/inschrijvingen/aanpassen/{referentie}','DeelnemersController@edit')->name('mijn-account.inschrijvingen.edit');
    Route::put('/inschrijvingen/aanpassen/{referentie}','DeelnemersController@update')->name('mijn-account.inschrijvingen.edit');
    Route::get('/teams', 'TeamsController@index')->middleware('auth')->name('mijn-account.teams');
    Route::get('/teams/nieuw','TeamsController@create')->name('mijn-account.teams.create');
    Route::post('/teams/nieuw','TeamsController@store')->name('mijn-account.teams.store');
    Route::get('/teams/aanpassen/{id}','TeamsController@edit')->name('mijn-account.teams.edit');
    Route::put('/teams/aanpassen/{id}','TeamsController@update')->name('mijn-account.teams.update');
    Route::get('/teams/verwijder/{id}','TeamsController@destroy')->name('mijn-account.teams.destroy');
});

/*
 * WEB HOOKS
 */
Route::post('/webhooks/mollie','PaymentController@mollieWebhook')->name('webhooks.mollie');

/*
 * AUTH
 */

Route::get('mijn-account/inloggen','Auth\LoginController@showLoginForm')->name('login');
Route::post('mijn-account/inloggen','Auth\LoginController@login')->name('login.submit');
Route::get('/mijn-account/uitloggen','Auth\LoginController@logout')->name('logout');
Route::get('mijn-account/nieuwe-gebruiker','Auth\LoginController@showNewUserForm')->name('user.new');
Route::post('mijn-account/nieuwe-gebruiker','Auth\LoginController@newUser')->name('user.new.submit');
Route::get('/mijn-account/wachtwoord-vergeten','Auth\ForgotPasswordController@showForgetPage')->name('password.forgotten');
Route::post('/mijn-account/wachtwoord-vergeten','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.resetmail');
Route::get('/mijn-account/wachtwoord-opnieuw-instellen','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/mijn-account/wachtwoord-opnieuw-instellen','Auth\ResetPasswordController@reset')->name('password.reset.submit');

