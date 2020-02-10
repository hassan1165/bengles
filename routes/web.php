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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('accounts', 'AccountController');

Route::resource('colors', 'ColorController');
Route::resource('sizes', 'SizeController');
Route::resource('designs', 'DesignController');

Route::resource('customers', 'CustomersController');

Route::resource('incomings', 'IncomingController');
Route::resource('incomingItems', 'IncomingItemsController');

Route::resource('washings', 'WashingController');
Route::resource('washingItems', 'WashingItemsController');

Route::resource('deliveries', 'DeliveryController');
Route::resource('deliveryItems', 'DeliveryItemsController');

Route::resource('customerPayments', 'CustomerPaymentController');

Route::resource('expenseCategoy', 'expenseCategoyController');
Route::resource('expenses', 'ExpenseController');

Route::resource('transactions', 'TransactionController');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);


	Route::resource('accounts', 'AccountController');

	Route::resource('colors', 'ColorController');
	Route::resource('sizes', 'SizeController');
	Route::resource('designs', 'DesignController');

	Route::resource('customers', 'CustomerController');
	Route::resource('labours', 'LabourController');

	Route::resource('incomings', 'IncomingController');
	Route::resource('incomingItems', 'IncomingItemsController');

	Route::resource('washings', 'WashingController');
	Route::resource('washingItems', 'WashingItemsController');

	Route::resource('deliveries', 'DeliveryController');
	Route::resource('deliveryItems', 'DeliveryItemsController');

	Route::resource('customerPayments', 'CustomerPaymentController');

	Route::resource('expenseCategory', 'expenseCategoryController');
	Route::resource('expenses', 'ExpenseController');

	Route::resource('transactions', 'TransactionController');


	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

