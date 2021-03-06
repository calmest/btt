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
    return view('external-pages.welcome');
});

// process login 
// Route::get('/login', 'LoginClientAccountController@');
Route::get('/login/account', 'LoginClientAccountController@showLogin')->name('login');
Route::post('/login/account', 'LoginClientAccountController@loginUser')->name('signin-user');
Route::post('/create/account', 'SignupClientAccountController@doSignup')->name('sigup-user');
Route::get('/create/account', 'SignupClientAccountController@signupForm')->name('signup-form');

// Activate Account
Route::get('/activation/by/email/', 'AccountActivationController@activate');

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
Route::get('/account/wallet',       'ClientHomeController@wallets');
Route::get('/account/wallet/{name}', 'ClientHomeController@showWallets');

Route::get('/client/load/wallets',   'ClientHomeController@loadWallet');
Route::post('/client/create/wallet', 'ClientHomeController@createWallet');

Route::get('/account/price-alert',  'ClientHomeController@alert');
Route::get('/account/transaction',  'ClientHomeController@transactions')->name('transactions');
Route::get('/account/exchange',     'ClientHomeController@exchange')->name('exchange');
Route::get('/account/setting',      'ClientHomeController@setting')->name('setting');

// Route::get('/account/chart/{pair}', 'ClientHomeController@charts')->name('charts');
Route::get('/account/payment/history', 'ClientHomeController@loadPayments')->name('load-payments');
Route::get('/account/transaction/history', 'ClientHomeController@loadTransactions')->name('load-transactions');
Route::get('/account/transaction/received', 'ClientHomeController@loadTransactionsReceived')->name('load-transactions-received');


// Process BTT chain
Route::post('/account/sell/btt', 'ClientHomeController@sellBtt')->name('sell-btt');
Route::post('/account/buy/btt',  'ClientHomeController@buyBtt')->name('buy-btt');
Route::post('/account/send/btt', 'ClientHomeController@sendBtt')->name('send-btt');

// Loan request
Route::post('/send/loan/request', 'ClientHomeController@requestLoan')->name('request-btt');

// Load charts and logout 
Route::get('/account/charts', 'ClientHomeController@charts')->name('charts');
Route::get('/account/logout', 'ClientHomeController@logout')->name('exit');


/*
|--------------------------------------------------------------------------
| Web Routes External Pages Here
|--------------------------------------------------------------------------
|
*/

// Admin Pages Controllers
Route::get('/admin',             'AdminPagesController@index');
Route::get('/admin/dashboard',   'AdminPagesController@dashboard');
Route::get('/admin/payments',    'AdminPagesController@payments');
Route::get('/admin/loans',       'AdminPagesController@loans');
Route::get('/admin/wallets',     'AdminPagesController@wallets');
Route::get('/admin/clients',     'AdminPagesController@clients');
Route::get('/admin/exchange',    'AdminPagesController@exchange');
Route::get('/admin/vaults/{id}', 'AdminPagesController@vaults');
Route::get('/admin/transaction', 'AdminPagesController@transactions');
Route::get('/admin/charts',      'AdminPagesController@charts');
Route::get('/admin/notifications', 'AdminPagesController@notifications');
Route::get('/admin/logout',      'AdminPagesController@logout');



// Admin pages for all post request and reseponse request
Route::post('/admin/update/vault', 'AdminFactoryController@addBtt');
Route::post('admin/upload/rate', 'AdminFactoryController@toggleRate');

Route::get('/admin/load/vault', 'AdminFactoryController@loadBtt');
Route::get('/admin/load/clients', 'AdminFactoryController@clients');
Route::get('/admin/load/exchange', 'AdminFactoryController@rate');
Route::get('/load/loan/request', 'AdminFactoryController@loadLoan');
Route::get('/load/loan/accepted', 'AdminFactoryController@loadAcceptedLoan');
Route::get('/load/count/clients', 'AdminFactoryController@countClients');
Route::get('/load/count/loans', 'AdminFactoryController@countLoans');

Route::get('/accept/loan/', 'AdminFactoryController@acceptLoan');


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

Route::get('/load/trade/history', 'BitxController@loadLastTrade');
// Route::get('/load/pairs',   'BitxController@loadPair');
// Route::get('/load/history', 'PoloniexController@loadhistory');
// Route::get('/load/ticker',  'PoloniexController@loadTicker');


Route::get('/reset-database', function (){
	Artisan::call('migrate:refresh');
	return redirect()->back();
});
Route::get('/clear-config', function (){
	Artisan::call('config:clear');
	return redirect()->back();
});
Route::get('/migrate', function (){
	Artisan::call('migrate');
	return redirect()->back();
});

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