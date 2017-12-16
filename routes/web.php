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
Route::get('/', function () {
    return view('internal-pages.welcome');
});

// process login 
Route::post('/login/account', 'LoginClientAccountController@loginUser')->name('signin-user');
Route::post('/create/account', 'SignupClientAccountController@doSignup')->name('sigup-user');
Route::get('/create/account', 'SignupClientAccountController@signupForm')->name('signup-form');


/*
|--------------------------------------------------------------------------
| Web Routes Client Home Controller
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/account/dashboard',    'ClientHomeController@dashboard');
Route::get('/account/wallets',      'ClientHomeController@wallets');
Route::get('/account/transactions', 'ClientHomeController@transactions')->name('transactions');
Route::get('/account/setting',      'ClientHomeController@setting')->name('setting');
Route::get('/account/chart/{pair}', 'ClientHomeController@charts')->name('charts');
Route::get('/account/logout',       'ClientHomeController@logout')->name('exit');


/*
|--------------------------------------------------------------------------
| Web Routes External Pages Here
|--------------------------------------------------------------------------
|
*/

// Admin Pages Controllers
Route::get('/admin',         'AdminPagesController@index');
Route::get('/admin/error',   'AdminPagesController@error');
Route::get('/admin/clients', 'AdminPagesController@clients');

// Admin Authentications 
Route::get('/admin/login',   'AdminLoginController@showLogin')->name('login-form');
Route::post('/admin/login',   'AdminLoginController@doLogin')->name('login-action');






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
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/