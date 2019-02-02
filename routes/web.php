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

/******************** Frontend *****************************/
Route::group([
	'namespace' => 'Frontend',
	'as' => 'frontend.'
],function(){
	Route::get('/','ProfileController@index')->name('profile');
	Route::get('/resume','ResumeController@index')->name('resume');
});



/*************************************************/

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


/* lam viec voi middleware */

Route::get('/film/watch/{age}',function($age){
	return "oke";
})->middleware('my.check.age:admin');

Route::get('not-found',function(){
	return "do not watch";
})->name('notFound');

Route::get('/check-number/{number}',function($number){
	return "yes"; 
});

Route::get('/test-controller/{name}/{id}','TestController@index')->name('test-controller');

Route::get('/test-age/{age}','TestController@checkAgeWatchFlim')->name('test-age');

Route::get('test-request/{myname}/{myage}','TestController@testRequest')->name('test-request');

Route::get('test-view','DemoController@index')->name('test-view');
Route::get('/contact','DemoController@contact')->name('contact');
Route::get('/about','DemoController@about')->name('about');

Route::group([
	'prefix' => 'db-query'
],function(){
	Route::get('/select','QueryDbController@index')->name('select');
	Route::get('/orm','QueryDbController@orm')->name('orm');
});

/******************** ADMIN ***************************************/
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'as' => 'admin.'
], function(){
	Route::get('/login','LoginController@index')->name('login');
	Route::post('/handle-login','LoginController@handleLogin')->name('handle-login');
	Route::get('/logout','LoginController@logout')->name('logout');
});


Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'as' => 'admin.',
	'middleware' => ['check.admin.login','web']
], function(){
	Route::get('/dashboard','DashboardController@index')->name('dashboard');
	
	Route::get('/profile','ProfileController@index')->name('profile');

	Route::get('/add-profile','ProfileController@addView')->name('formAddProfile');

	Route::post('/handle-add-profile','ProfileController@handleAdd')->name('handleAddProfile');

	Route::post('/delete-profile','ProfileController@deleteProfile')->name('deleteProfile');

	Route::get('/edit-profile/{id}','ProfileController@editProfile')->name('editProfile');
	Route::post('handle-edit-profile/{id}','ProfileController@handleEdit')->name('handleEdit');
});












