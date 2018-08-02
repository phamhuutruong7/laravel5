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