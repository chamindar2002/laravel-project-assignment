<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
});



Route::get('api/cities', array('as' => 'api.cities', 'uses' => 'CityController@getCityDataTable'));
Route::get('api/hotels', array('as' => 'api.hotels', 'uses' => 'HotelController@getHotelDataTable'));

/*
Route::get('users', array('uses'=>'UserController@index'));
Route::get('users/{username}', array('uses'=>'UserController@show'));
* 
*/


Route::resource('city','CityController');
Route::resource('hotel','HotelController');

Route::group(array('before' => 'auth'), function(){
	/*Route::get('admin', 'AdminController@index');
	Route::get('logout', 'HomeController@logout');*/
        
});