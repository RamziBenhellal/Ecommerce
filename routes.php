<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Home routes : */ 
Route::get('/','HomeController@index');
Route::get('/category/{id}','HomeController@category');
/* User routes: */
Route::resource('users','UsersController');
/* Client routes: */ 
Route::resource('clients','ClientsController');
/* Chart routes */
Route::resource('charts','ChartsController'); 
/* Product category routes: */
Route::resource('product_categories','ProductCategoriesController');
/* Product routes */ 
Route::get('products/createImage','ProductsController@createImage');
Route::post('products/storeImage','ProductsController@storeImage');
Route::resource('products','ProductsController');
/* Size routes */
 Route::resource('sizes','SizesController');
/* Colour routes: */
Route::resource('colours','ColoursController');
/* Order routes: */
Route::resource('orders','OrdersController');
/* Mail routes: */
Route::resource('mails','MailsController');
/*Comment routes: */
Route::resource('comments','CommentsController');
/* authentification */
Route::auth();