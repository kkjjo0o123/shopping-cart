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

Route::get('/home', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addProduct',[
    'uses'=>'ProductController@create',
    'as'=>'product'
]);

Route::post('/addproduct/store',[
    'uses'=>'ProductController@store',
    'as'=>'addProduct.store'
]);

Route::get('/viewproduct',[
    'uses'=>'ProductController@view',
    'as'=>'view.Product'
]);

Route::get('/viewproduct/delete/{id}', [
'uses'=>'ProductController@delete',
'as' => 'viewproduct.delete'
]);

Route::get('/viewlist',[
'uses'=>'ProductController@viewlist',
'as'=>'view.list'


]);

Route::get('/productdetail/{id}', [
    'uses'=>'ProductController@detail',
    'as' => 'product.detail'
]);

Route::post('/viewlist', [
    'uses'=>'ProductController@search',
    'as'=>'search.product'//when we click search, then it will run this code search.product and it will link to product controller@search
]);

Route::get('editproduct/{id}', [
    'uses'=>'ProductController@edit',
    'as' => 'edit.product'
]);

Route::post('updateproduct', [
    'uses'=>'ProductController@update',
    'as' => 'update.product'
]);

Route::get('/userproduct',[
    'uses'=>'ProductController@views',
    'as'=>'view.Products'
]);

//process paymment
Route::post('paypal','PaymentController@payWithpaypal');

//check status
Route::get('status','PaymentController@getPaymentStatus');

