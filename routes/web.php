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

/***********************  GUEST  ****************************/
Route::get('/', 'PublicController@index')
        ->name('index');

Route::get('/catalogo', 'PublicController@showCatalog')
        ->name('catalogo');

/** La ricerca fa uso di un form con metodo POST */
Route::post('/catalogo/cerca', 'PublicController@cerca')
        ->name('cerca');

Route::get('/catalogo/cerca/{prodotto}', 'PublicController@showSearch')
        ->name('cerca/{prodotto}');

Route::post('/catalogo', 'PublicController@showCatalog') 
        ->name('catalogo');

Route::get('/catalogo/{categoria}', 'PublicController@showCatalog')
        ->name('catalogo/{categoria}');

Route::post('/catalogo/desc/', 'PublicController@getInfoProdotto') 
        ->name('descEstesa');
        
/***********************  USER  ****************************/

Route::get('/user', 'UserController@index')
        ->name('user');

Route::get('/user/editProfilo', 'UserController@editProfilo')
        ->name('editProfilo');

Route::post('/user/editProfilo', 'UserController@storeProfilo')
        ->name('editProfilo.store');

/*********************** ADMIN ****************************/

Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::get('/admin/addStaff', 'AdminController@addStaff')
        ->name('addStaff');

Route::post('/admin/addStaff', 'AdminController@storeStaff')
        ->name('addStaff.store');

Route::get('/admin/listaUtenti/{ruolo}', 'AdminController@listaUtenti')
        ->name ('listaUtenti/{ruolo}');

Route::post('/admin/eliminaProfilo/{ruolo}', 'AdminController@eliminaProfilo')
        ->name ('eliminaProfilo/{ruolo}');

Route::get('/admin/modificaStaff/{username}', 'AdminController@modificaStaff')
        ->name('modificaStaff/{username}');

Route::post('/admin/modificaStaff', 'AdminController@updateStaff')
        ->name('modificaStaff.store');

/*********************** STAFF ****************************/

Route::get('/staff', 'StaffController@index')
        ->name('staff');

Route::get('/staff/addProduct', 'StaffController@addProduct')
        ->name('nuovoProdotto');

Route::post('/staff/addProduct', 'StaffController@storeProduct')
        ->name('nuovoProdotto.store');

Route::get('/staff/listaProdotti', 'StaffController@listaProdotti')
        ->name('listaProdotti');

Route::get('/staff/modificaProdotto/{id}', 'StaffController@modificaProdotto')
        ->name ('modificaProdotto/{id}');

Route::post('/staff/updateProdotto', 'StaffController@updateProdotto')
        ->name ('updateProdotto');

Route::post('/staff/eliminaProdotti', 'StaffController@eliminaProdotti')
        ->name ('eliminaProdotti');
/*-----------------------------------------*/
Route::get('/staff/aggiungiCategoria','StaffController@aggiungiCat')
        ->name ('aggiungiCategoria');

Route::post('/staff/aggiungiCategoria','StaffController@storeCat')
        ->name ('aggiungiCategoria.store');

Route::post('/staff/aggiungiSub','StaffController@storeSub')
        ->name ('aggiungiSub.store');

/*********************** AUTENTICAZIONE ****************************/

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

Route::post('/valida/username', 'AdminController@getAllUsername')
        ->name('getAllUsers');

/*-----------------------------------------*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');




// Rotte inserite dal comando artisan "ui vue --auth"
// Auth::routes();   genera le ROTTE PREDEFINITE per tutti i controller in app/Http/controllers/auth
