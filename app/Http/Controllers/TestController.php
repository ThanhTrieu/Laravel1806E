<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	public function __construct()
	{
		// nap - trieu goi middleware
		// $this->middleware('my.check.age') // all method
		//$this->middleware('my.check.age')->only('checkAgeWatchFlim');
		//$this->middleware('my.check.age:user')->except(['checkAgeWatchFlim','index']);
	}

    public function index($myName, $id, Request $request){
    	//return "Hello you - {$myName} - {$id}";
    	$name = $request->name;
    	$id = $request->id;
    	return "Hello you - {$name} - {$id}";
    }

    public function checkAgeWatchFlim($age)
    {
    	// su dung middleware trong controller
    	return "my age - {$age}";
    	
    }

    public function testRequest(Request $request){
    	$id = $request->id;
    	$name = $request->input('name');
    	// $_GET['name']
    	//dd($name); // var_dump + die
    	//$url = $request->url();
    	// ?id=10&name='abc' : query string
    	//$url = $request->fullUrl();
    	//dd($url);

    	// kiem tra phuong thuc gui len xem la phuong thuc nao : GET / POST / PUT/ PATCH/ DELETE
    	if($request->isMethod('post')){
    		//echo "AAAA";
    	} else {
    		//echo "BBBB";
    	}

    	//dd($request->all());
    	//$request->money;
    	//dd($request->input('money','10000000000'));
    	dd($request->input('myname'));

    }
}
