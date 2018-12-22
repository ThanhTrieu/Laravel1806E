<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
    	// truyen du lieu tu controller ra view
    	// 1/ truyen nhieu du lieu cung 1 luc - su dung mang
    	$data = [
    		'name' => 'ABC',
    		'age' => 20,
    		'email' => 'test@gmail.com',
    		'phone' => '09876543'
    	];

    	$money = 1234567890;

    	$infoSt = [
    		[
    			'msv' => 113,
    			'name' => 'ABC',
	    		'age' => 20,
	    		'email' => 'test@gmail.com',
	    		'phone' => '09876543',
	    		'money' => 123456
    		],
    		[
    			'msv' => 114,
    			'name' => 'EFG',
	    		'age' => 20,
	    		'email' => 'test@gmail.com',
	    		'phone' => '09876543',
	    		'money' => 12434
    		],
    		[
    			'msv' => 115,
    			'name' => 'XYZ',
	    		'age' => 20,
	    		'email' => 'test@gmail.com',
	    		'phone' => '09876543',
	    		'money' => 1234
    		]
    	];



    	// nap vao - load 1 file view
    	// return view('demo',[
    	// 	'info' => $data
    	// ]);
    	// return view('demo')->with('m',$money);
    	return view('demo',['info' => $infoSt]);
    }
}
