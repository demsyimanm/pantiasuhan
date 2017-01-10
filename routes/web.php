<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@login');
Route::get('login', function () {
    return redirect('/');
});
Route::post('login', 'HomeController@login');
Route::get('user/video', 'HomeController@video');
Route::get('user/artikel', 'HomeController@artikel');
Route::get('user/artikel/{id}', 'HomeController@artikelRead');
Route::get('user/schedule', 'HomeController@calendar');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('admin','AdminController@index');
	Route::get('logout','HomeController@logout');

	/*ARTIKEL*/
	Route::get('artikel','ArtikelController@index');
	Route::get('artikel/add','ArtikelController@create');
	Route::post('artikel/add','ArtikelController@create');	
	Route::get('artikel/remove/{id}','ArtikelController@destroy');	
	Route::get('artikel/edit/{id}','ArtikelController@update');
	Route::post('artikel/edit/{id}','ArtikelController@update');	

	/*VIDEO*/
	Route::get('video','VideoController@index');
	Route::get('video/add','VideoController@create');
	Route::post('video/add','VideoController@create');
	Route::get('video/remove/{id}','VideoController@destroy');	
	Route::get('video/edit/{id}','VideoController@update');
	Route::post('video/edit/{id}','VideoController@update');	

	/*JADWAL*/
	Route::get('jadwal','JadwalController@index');
	Route::get('jadwal/add','JadwalController@create');
	Route::post('jadwal/add','JadwalController@create');
	Route::get('jadwal/remove/{id}','JadwalController@destroy');	
	Route::get('jadwal/edit/{id}','JadwalController@update');
	Route::post('jadwal/edit/{id}','JadwalController@update');	

});