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
Route::get('/welcome',function(){
	return view('welcome');
});

Route::get('/','indexController@main');
Route::get('/community','indexController@community');
Route::get('/about','indexController@about');

//board목록
Route::get('/Board/{category}','indexController@Board');
// Route::get('/QnABoard','indexController@QnABoard');
// Route::get('/marketBoard','indexController@marketBoard');

//form목록
Route::get('/write_form/{category}','indexController@write_form');
Route::get('/write_formMarket','indexController@write_formMarket');
Route::get('/modify_form/{num}','indexController@modify_form');

//execute 목록
Route::get('/writeUpload','indexController@writeUpload');
Route::post('/write','indexController@write');
Route::post('/modify','indexController@modify');
Route::post('/destroy','indexController@destroy');

//view
Route::get('/view/{num?}','indexController@view');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
