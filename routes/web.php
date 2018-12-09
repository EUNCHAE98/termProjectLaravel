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


/*
	Route of MainPage
	
	1. main
	2. community
	3. about
	4. adminPage
*/
Route::get('/','indexController@main');
Route::get('/community','indexController@community')->name('community');
Route::get('/adminPage','indexController@adminPage');
Route::get('/about','indexController@about')->name('about');


/*
	Route of Board
	
	1. board (with pagination)
	2. write
	3. modify
	4. delete
	5. view
*/
Route::get('/Board/{category}','BoardController@Board');
Route::get('boards', function () {
    $boards = App\board::paginate(3);

    $boards->withPath('custom/url');
});

Route::get('/write_form/{category}','BoardController@write_form');
Route::post('/write','BoardController@write');
Route::get('/writeUpload','BoardController@writeUpload');

Route::get('/modify_form/{num}','BoardController@modify_form');
Route::post('/modify','BoardController@modify');

// Route::delete('/destroy/{num}', ['as' => 'destroy', 'use' => 'BoardController@destroy']);
Route::delete('/destroy/{board}', 'BoardController@destroy')->name('board.destroy');

Route::get('/view/{num?}','BoardController@view','BoardController@marketPop');
Route::post('/comment/{num?}','BoardController@comment');

Route::delete('/commentDestroy/{c_id}', 'BoardController@commentDestroy');


//Route::resource('board','BoardController');

/*
	Route of market

	1. buy
	2. popUpMessage(with ajax)
	3. buyConfirm
*/
Route::post('/buy/{num}','BoardController@buy');
Route::get('/getRequest', 'AjaxController@returnMessage');
Route::post('/buyConfirm/{order_id}', 'BoardController@buyConfirm');

/*
	Route of adminPage

	1. user management
	2. calendar management
*/
Route::post('/userDelete','indexController@userDelete');
Route::get('/goToUserBoard/{name}','indexController@goToUserBoard');

Route::resource('tasks', 'TasksController');


/*
	Route of user confirmation and login
*/
Route::get('register/{code}', 'Auth\RegisterController@confirm')->name('register.confirm');
Auth::routes();



// Route::get('/home', 'HomeController@index')->name('home');

/*
	Route of kakaoLogin
*/
Route::get('kakao','kakaoLoginController@index');
Route::get('login/kakao','kakaoLoginController@redirectToProvider');
Route::get('login/kakao/callback','kakaoLoginController@handleProviderCallback');

/*
	Route of user

	1. update
*/
Route::post('/update/{id}', 'indexController@update');
