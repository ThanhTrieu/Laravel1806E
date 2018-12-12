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

/* method GET */
Route::get('/hello', function(){
	return 'Hello word';
});

// method post
Route::post('/demo-post',function(){
	return 'this is method post';
});

// method put
Route::put('/demo-put',function(){
	return 'This is method put';
});

// method delete
Route::delete('/demo-delete', function(){
	return 'this is method Delete';
});

// 1 request vua la method get hoac post
Route::match(['get','post'],'/get-post',function(){
	return "GET OR POST";
});

// 1 request chap nhan tat ca cac phuong thuc
Route::any('/demo-any',function(){
	return "somthing request";
});

// dieu huong cac route
// tuong duong giong ham header("Location:domain");
Route::get('/aff',function(){
	return redirect('viet-nam');
});

Route::get('viet-nam',function(){
	return "Vo Dich";
});

//Route::redirect('viet-nam','/demo-any',301);
// view route
Route::get('chung-ket-luot-ve',function(){
	return view('final');
});


// Route param
// tham so bat buoc	
Route::get('/i-phone/{name}/{price?}/{id}',function($n,$p=null,$id){
	return " Iphone - {$n} / Price - {$p}";
})->where('id','\d+');

// tham so khong bat buoc
Route::get('/sam-sung/{name?}/{id}', function($n = null,$id){
	return "Samsung - {$n} - {$id}";
})->where('id','\d+')->name('samsung');

Route::get('b-phone-made-in-vn',function(){
	return 'made in VN';
})->name('bphone');

Route::get('/view-sam-sung',function(){

	return redirect()->route('samsung',[
		'name'=>'ha-noi',
		'id' => 10
	]);
});

Route::get('view-name-route',function(){
	$url = route('bphone');
	return "This name route : {$url}";
});

// Route::get('/admin/user',function(){
// 	return 'admin/user';
// });
// Route::get('/admin/dashboard',function(){
// 	return 'admin/dashboard';
// });

Route::prefix('admin')->group(function(){

	Route::get('/user',function(){
		return 'admin/user';
	});

	Route::get('/dashboard',function(){
		return 'admin/dashboard';
	});
});










