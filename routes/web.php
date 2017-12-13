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
    return view('welcome');
});

// process login 
Route::post('/login/account', 'LoginClientAccountController@loginUser');
Route::get('/create/account', 'SignupClientAccountController@signupForm')->name('signup');



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

Route::get('/admin', function () {
    return view('admin-pages.index');
});

Route::get('/admin/login', function () {
    return view('admin-pages.login');
});
Route::post('/admin/login', function () {
    return redirect('/admin');
});

Route::get('/admin/error', function(){
	return view('admin-pages.error-page');
});