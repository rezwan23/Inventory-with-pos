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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/profile/{id}', 'UserController@showUserProfile')->middleware('mydata')->name('showuserprofile');
Route::post('/user/profile/{id}', 'UserController@updateUserProfile')->name('updateuserprofile');
Route::resource('/customer', 'CustomerController');
Route::post('/customer/import', 'CustomerController@import')->name('customer.import');
Route::resource('/supplier', 'SupplierController');
Route::resource('/employee', 'EmployeeController');
Route::resource('/category', 'CategoryController');
Route::resource('/item', 'ItemController');
Route::get('/pos', 'PosController@index')->name('posindex');
Route::post('/pos', 'PosController@addToCart')->name('posaddtocart');
Route::post('/deletecart', 'PosController@deleteCartItem')->name('deletecartitem');
Route::post('/deleteallcart', 'PosController@deleteAllCartItem')->name('deleteallcartitem');
Route::get('/account', 'AccountController@index')->name('account.index');
Route::post('/account', 'AccountController@store')->name('account.store');
Route::post('/account/edit', 'AccountController@edit')->name('account.edit');
Route::delete('/account/{account}', 'AccountController@destroy')->name('account.destroy');
Route::post('/account/update', 'AccountController@update')->name('account.update');
Route::get('/error', 'ErrorController@err404')->name('404error');
Route::post('/pos/invoice', 'PosController@itemSellInvoiceShow')->name('sellInvoice.show');
