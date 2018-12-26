<?php

namespace App\Http\Controllers;

// su dung thu vien DB - ket noi hay truy van du lieu
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QueryDbController extends Controller
{
    public function index()
    {

    	$admin = DB::table('admins')->get();
    	// SELECT * FROM admins
    
    	// chuyen object laravel ve mang 
    	$admin = json_decode($admin,true);
    	// dd($admin);
    	foreach ($admin as $key => $value) {
    		echo $value['id'];
    		echo "<br/>";
    	}

    	$name = DB::table('admins')
    	            ->select('username')
    	            ->where('id',10)
    	            ->first();
    	dd($name);
    	// get() : lay tat du lieu => tra ve mang da chieu
    	// first(): lay 1 dong du lieu => tra ve mang 1 chieu
    	// SELECT `username` FROM admins WHERE id = 10 LIMIT 1;


    }
}
