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

/***********************  GUEST  **********************/
Route::view('/contatti', 'contatti')
        ->name('contatti');

Route::get('/', 'PublicController@index')
        ->name('index');

Route::get('/catalogo/{categoria}', 'PublicController@showCatalog')
        ->name('catalogo/{categoria}');

Route::get('/catalogo', 'PublicController@showCatalog')
        ->name('catalogo');

/***********************  USER  **********************/
Route::get('/user', 'UserController@index')
        ->name('user')
        ->middleware('can:isUser');

Route::get('/user/modificaProfilo', 'UserController@modificaProfilo')
        ->name('modificaProfilo');

Route::get('/user/catalogo', 'UserController@showCatalog')
        ->name('catalogoUser');


/*********************** ADMIN **********************/
Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::get('/admin/nuovoUtente', 'AdminController@addUser')
        ->name('nuovoUtente');

Route::post('/admin/nuovoUtente', 'AdminController@storeUser')
        ->name('nuovoUtente.store');

/*********************** STAFF **********************/
Route::get('/staff', 'StaffController@index')
        ->name('staff');

Route::get('/staff/addProduct', 'StaffController@addProduct')
        ->name('nuovoProdotto');

Route::post('/staff/addProduct', 'staff@storeProduct')
        ->name('nuovoProdotto.store');


/*********************** AUTENTICAZIONE *********************/

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');
Route::post('login','Auth\LoginController@login' );
Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');


Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');
Route::post('register', 'Auth\RegisterController@register');





// Rotte inserite dal comando artisan "ui vue --auth"
// Auth::routes();   genera le ROTTE PREDEFINITE per tutti i controller in app/Http/controllers/auth
