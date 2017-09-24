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

Route::get('/', function () {
	return view('index');
});

Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('myprofile', 'UserController');

	Route::get('myprofile/{myprofile}', [
		'uses'=>'UserController@destroy',
		'as'  =>'myprofile.destroy'
	]);

	Route::resource('accounts', 'AccountController');
	Route::get('accounts/{accounts}',[
		'uses'=>'AccountController@destroy',
		'as'=>'accounts.destroy'
	]);

	Route::resource('movements', 'MovementController');

	Route::get('movements/{movements}', [
		'uses'=>'MovementController@destroy',
		'as'  =>'movements.destroy'
	]);

	Route::get('movements/show/{movements}', [
		'uses'=>'MovementController@show',
		'as'  =>'movements.show'
	]);

	Route::get('movement/{movement}',[
		'uses'=>'MovementController@select',
		'as'  =>'movement.select'
	]);

	Route::post('movement/{account}',[
		'uses'=>'MovementController@new',
		'as'  =>'movement.new'
	]);

	Route::post('movement/edit/{id}',[
		'uses'=>'MovementController@updte',
		'as'  =>'movement.updte'
	]);

});
