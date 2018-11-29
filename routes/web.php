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
Route::get('/community','indexController@community')->name('community');
Route::get('/adminPage','indexController@adminPage');
Route::get('/about','indexController@about');
Route::post('/userDelete','indexController@userDelete');
Route::get('/goToUserBoard/{name}','indexController@goToUserBoard');

//board목록
Route::get('/Board/{category}','indexController@Board');
// Route::get('/QnABoard','indexController@QnABoard');
// Route::get('/marketBoard','indexController@marketBoard');


Route::get('/buy', 'indexController@buy');

//form목록
Route::get('/write_form/{category}','indexController@write_form');
Route::get('/modify_form/{num}','indexController@modify_form');

//execute 목록
Route::get('/writeUpload','indexController@writeUpload');
Route::post('/write','indexController@write');
Route::post('/modify','indexController@modify');
Route::post('/destroy', ['as' => 'destroy', 'use' => 'indexController@destroy']);

//view
Route::get('/view/{num?}','indexController@view');
Route::post('/comment/{num?}','indexController@comment');

Route::get('register/{code}', 'Auth\RegisterController@confirm')->name('register.confirm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('boards', function () {
    $boards = App\board::paginate(3);

    $boards->withPath('custom/url');

    //
});

Route::resource('tasks', 'TasksController');


//kakaotalk login
Route::get('kakao','kakaoLoginController@index');
Route::get('login/kakao','kakaoLoginController@redirectToProvider');
Route::get('login/kakao/callback','kakaoLoginController@handleProviderCallback');
