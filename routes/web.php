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

//Blade Templates
Route::get('blade',function(){
	return view('pages.laravel');
});

Route::get('BladeTemplate/{str}','MyController@blade');


Route::get('database1',function(){
	Schema::create('loaisanpham', function($table){
		$table->increments('id');
		$table->string('ten',200);
	});
});

//Work with the Database
Route::get('database', function(){
	//Schema::create('loaisanpham',function($table){
	//	$table->increments('id');
	//	$table->string('ten',200);
	//
	//});
	
	Schema::create('theloai', function($table){
		$table->increments('id');
		$table->string('ten',200)->nullable();
		$table->string('nhasanxuat')->default('Nha san xuat');

	});

	echo "Da thuc hien lenh Create table";
});

//Create relation between 2 tables
Route::get('lienketbang',function(){
	Schema::create('sanpham', function($table){
		$table->increments('idSanPham');
		$table->string('ten');
		$table->float('giatien');
		$table->integer('soluong')->default(0);
		$table->integer('id_loaisanpham')->unsigned();
		$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');


	});
	echo "Da tao lien ket giua 2 bang";
});

//Update table
Route::get('suabang',function(){
	Schema::table('theloai',function($table){
		$table->dropColumn('nhasanxuat');
	});
	echo "Da sua bang";
});

//Add a column
Route::get('themcot', function(){
	Schema::table('theloai',function($table){
		$table->string('email', 200);
	});
	echo "Da tao them cot email";
});

//Rename table
Route::get('doiten', function(){
	Schema::rename('theloai','nguoidung');
	echo "Da doi ten";
});

//Delete table
Route::get('xoabang',function(){
	Schema::drop('nguoidung');
	echo "Da xoa bang";
});
//If the table is not exist and you keep trying to delete the table, the bug will happen
//Then better you should use dropIfExist
Route::get('xoabang',function(){
	Schema::dropIfExists('nguoidung');
	echo "Da xoa bang.";
});

Route::get('taobang',function(){
	Schema::create('nguoidung',function($table){
		$table->increments('id');
		$table->string('ten',200)->nullable();
		$table->string('nsx')->default('Nha san xuat');
	});
	echo "Da tao bang";
});

//Query Builder
Route::get('qb/get', function(){
	$data = DB::table('users')->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//This is a query with condition
//SELECT * FROM USERS WHERE id = 3
Route::get('qb/where', function(){
	$data = DB::table('users')->where('id','=',3)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}

});

//SELECT Users.id, Users.name, Users.email FROM USERS WHERE id = 3
Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id',3)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//SELECT NAME AS HOTEN FROM USERS
Route::get('qb/raw',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',3)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//OrderBy
Route::get('qb/orderby',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>',1)->orderBy('id','desc')->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//LIMIT 2,5
Route::get('qb/limit',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>',1)->orderBy('id','desc')->skip(1)->take(5)->get();

	echo $data->count();
	foreach($data as $row)
	{
		foreach($row as $key=>$value)
		{
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//Update where id = 1
Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name'=>'index','email'=>'something@gmail.com' ]);
	echo "Da update du lieu";
});

//Delete()
Route::get('qb/delete',function(){
	DB::table('users')->where('id','=',1)->delete();
	echo "Da xoa";
});

//Truncate()
Route::get('qb/truncate', function(){
	DB::table('users')->truncate();
	echo "Da xoa tat ca";
});

//Model
Route::get('model/save',function(){
	$user = new App\User();
	$user->name = "Charlie";
	$user->email= "Charlie@email.com";
	$user->password = "secret";

	$user->save();
	echo "Da thuc hien save cho user";
});

//to call a model
Route::get('model/query', function(){
	$user = App\User::find(4);
	echo $user->name;
});

//Insert to test if Model Sanpham.php work
Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\Sanpham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();
	echo "Da thuc hien lenh save() ".$ten." len table SanPham";
});

//Query from model
Route::get('model/sanpham/all', function(){
	$sanpham = App\SanPham::all()->toArray();
	var_dump($sanpham);
	
});

//Query with condition
Route::get('model/sanpham/ten',function(){
	$sanpham = App\SanPham::where('ten','laptop')->get()->toArray();
	echo $sanpham[0]['ten'];
});

//Delete
Route::get('model/sanpham/delete',function(){
	App\Sanpham::destroy(4);
	echo "Da xoa";
});

//Create the id_loaisanpham in sanpham to make the constraint
Route::get('taocot', function(){
	Schema::table('sanpham', function($table){
		$table->integer('id_loaisanpham')->unsigned();
	});
});

Route::get('lienket', function(){
	$data = App\SanPham::find(3)->loaisanpham->toArray();
	var_dump($data);
});

Route::get('lienketloaisanpham', function(){
	$data = App\LoaiSanPham::find(1)->sanpham->toArray();
	var_dump($data);
});

//Middleware test
Route::get('diem', function(){
	echo "Ban da du diem";
})->middleware('MyMiddle')->name('diem');

Route::get('loi', function(){
	echo "Ban chua du diem";
})->name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
})->name('nhapdiem');

//Auth
Route::get('dangnhap',function(){
	return view('dangnhap');
});
//There is a small thing here. If someone change the route 'dangnhap'
//and return the view('thanhcong'), it still be successful
//This route to test that and fix it
//Just replace the name 'dangnhap' with 'thu'
Route::get('thu',function(){
	return view('thanhcong');
});

Route::post('login','AuthController@login')->name('login');

Route::get('logout','AuthController@logout');

//Session
////If you want to use the session, you must let it in the middleware
Route::group(['middleware'=>['web']],function(){
	Route::get('Session',function(){
		Session::put('KhoaHoc','Laravel');
		Session::put('Laptrinh','Web');
		//put('nameOfTheSession','valueOfTheSession');
		echo "Da dat Session";
		echo "<br>";
		//Session::forget('KhoaHoc');
		Session::flash('mess','Hello');
		echo Session::get('mess');
		//Session::flush();
		//echo Session::get('KhoaHoc');
		//get('KhoaHoc') to print out the value of the Session's name
		if(Session::has('KhoaHoc'))
			echo "Da ton tai session";
		else
			echo "Chua ton tai session";
	});
	//Flash will appear only in a few seconds.
	Route::get('Session/flash', function(){
		echo Session::get('mess');
	});
});