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
Route::get('/', 'PublicController@index')
        ->name('index');

Route::get('/catalogo', 'PublicController@showCatalog')
        ->name('catalogo');

Route::get('/catalogo/{categoria}', 'PublicController@showCatalog')
        ->name('catalogo/{categoria}');

Route::view('/catalogo/desc/{prodotto}', 'PublicController@showDesc')
        ->name('desc/{prodotto}');

/***********************  USER  **********************/
Route::get('/user', 'UserController@index')
        ->name('user');

Route::get('/user/editProfilo', 'UserController@editProfilo')
        ->name('editProfilo');

Route::post('/user/editProfilo', 'UserController@storeProfilo')
        ->name('editProfilo.store');

Route::get('/user/catalogo', 'UserController@showCatalog')
        ->name('catalogoUser');


/*********************** ADMIN **********************/
Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::get('/admin/eliminaUtente', 'AdminController@eliminaUtente')
        ->name ('eliminaUtente');

Route::post('/admin/eliminaUtente', 'AdminController@eliminaUtenteSel')
        ->name ('eliminaUtente.store');

Route::get('/admin/addStaff', 'AdminController@addStaff')
        ->name('addStaff');

Route::post('/admin/addStaff', 'AdminController@storeStaff')
        ->name('addStaff.store');

Route::get('/admin/eliminaStaff', 'AdminController@eliminaStaff')
        ->name ('eliminaStaff');

Route::post('/admin/eliminaStaff', 'AdminController@eliminaStaffSel')
        ->name ('eliminaStaff.store');

/*********************** STAFF **********************/
Route::get('/staff', 'StaffController@index')
        ->name('staff');

Route::get('/staff/addProduct', 'StaffController@addProduct')
        ->name('nuovoProdotto');

Route::post('/staff/addProduct', 'StaffController@storeProduct')
        ->name('nuovoProdotto.store');

Route::get('/staff/modificaProdotto', 'StaffController@modificaProdotto')
        ->name ('modificaProdotto');

Route::post('/staff/modificaProdotto', 'StaffController@prodottoSelezionato')
        ->name ('prodottoSelezionato');

Route::get('/staff/eliminaProdotto', 'StaffController@eliminaProdotto')
        ->name ('eliminaProdotto');

Route::post('/staff/eliminaProdotto', 'StaffController@eliminaProdottoConf')
        ->name ('eliminaProdotto.store');

/*********************** AUTENTICAZIONE *********************/

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');


Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');




// Rotte inserite dal comando artisan "ui vue --auth"
// Auth::routes();   genera le ROTTE PREDEFINITE per tutti i controller in app/Http/controllers/auth
