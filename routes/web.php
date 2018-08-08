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

Route::get('test', function () {
    return 'Hello World';
});

Route::get('KhoaHoc', function () {
    return "Xin chào các bạn";
});

Route::get('KhoaPham/Laravel', function(){
	echo "<h1>Khoa Hoc - Laravel</h1>";
});

//Parameter reference
Route::get('HoTen/{ten}', function($ten){
	echo "Ten cua ban la: ".$ten;
});

Route::get('Laravel/{ngay}', function($ngay){
	echo "Khoa Pham: ".$ngay;

})-> where(['ngay' =>'[a-zA-Z]+']);

//Identificate for the route
//Solution 1
Route::get('Route1',['as' =>'MyRoute', function(){
	echo "Xin chao cac ban";
}]);
//Solution 2
Route::get('Route2', function(){
	echo "This is Route2";
})->name('MyRoute2');

//To call a route, we need to call it in a redirect with their name
Route::get('GoiTen',function(){
	return redirect() ->route('MyRoute2');
});


//Route Group
Route::group(['prefix'=>'MyGroup'], function(){
	//Call Route User1	domain/MyGroup/User1
	Route::get('User1', function(){
		echo "User1";
	});
	//Call Route User2	domain/MyGroup/User2
	Route::get('User2', function(){
		echo "User2";
	});
	//Call Route User3	domain/MyGroup/User3
	Route::get('User3', function(){
		echo "User3";
	});
});

//Call MyController.php
Route::get('CallController','MyController@XinChao');

Route::get('ThamSo/{ten}', 'MyController@KhoaHoc');

//Work with URL
Route::get('MyRequest','MyController@GetURL');

//Send and receive request
Route::get('getForm', function(){
	return view('postForm');
});

Route::post('postForm', ['as' => 'postForm', 'uses' => 'MyController@postForm']);

//Cookie
Route::get('setCookie','MyController@setCookie');
Route::get('getCookie','MyController@getCookie');

//Upload file
Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);

Route::get('uploadFile',function(){
	return view('postFile');
});

//JSON
Route::get('getJson','MyController@getJson');

//View 
Route::get('myView','MyController@myView');

//Pass the data throught view
Route::get('Time/{t}','MyController@Time');

View::share('KhoaHoc','Laravel');

