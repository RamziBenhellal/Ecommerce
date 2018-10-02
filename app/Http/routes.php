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

Auth::routes();

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
Route::get('orders/{id}/treat','OrdersController@treat');

/* Mail routes: */
Route::resource('mails','MailsController');
/*Comment routes: */
Route::resource('comments','CommentsController');
/* authentification */
Route::auth();
// get image from db
Route::get('image/{id}', function ($id) {
	// Find the image
	$image = App\ProductImages::find($id);
	
	// Return the image in the response with the correct MIME type
	return response()->make($image->image, 200, array(
			'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($image->image)
	));
});
// transporter image
	Route::get('transporterAvatar/{id}', function ($id) {
		// Find the user
		$transporter = App\Transporter::find($id);
		
		// Return the image in the response with the correct MIME type
		return response()->make($transporter->avatar, 200, array(
				'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($transporter->avatar)
		));
	});

/* Transporter routes: */
	Route::resource('transporters','TransportersController');


/* Transaction route */
Route::resource('transaction','TransactionController');
	
	












