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
Route::get('/', 'PublicController@index')
        ->name('index');
        
Route::get('/catalogo/{categoria}', 'PublicController@showCatalog')
        ->name('catalogo');

Route::get('/catalogo', 'PublicController@showCatalog')
        ->name('catalogo');
 
Route::get('/login', 'PublicController@showLoginForm')       //NON DEFINITIVA serve a non effettuare prima il login
        ->name('login');


Route::get('/user', 'UserController@index')
        ->name('user');
        //->middleware('can:isUser');   //controlla che abbia fatto il login




Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::get('/admin/addProduct', 'AdminController@addProduct')
        ->name('nuovoProdotto');

Route::post('/admin/addProduct', 'AdminController@storeProduct')
        ->name('nuovoProdotto.store');





/* Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');     */

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');



// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');



Route::view('/contatti', 'contatti')
        ->name('contatti');


// Rotte inserite dal comando artisan "ui vue --auth" 
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
