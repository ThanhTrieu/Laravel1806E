<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    // chi dinh file model nay se lam viec voi bang nao trong db
    // 1 file model chi anh xa - lam viec voi 1 bang database
    protected $table = 'posts';

    // tao 1 phuong thuc noi len moi quan he voi bang comment
    public function comment()
    {
    	return $this->hasMany('App\Model\Comment');
    }

    public function getAllData()
    {
    	$data = DB::table('posts')->get();
    	return $data;
    }

    public function getAllDataPost()
    {
    	//return Post::all()->toArray(); // ORM laravel
    	// DB::table('posts')->get();
    	$data = Post::all();
    	$data = ($data) ? $data->toArray() : [];
    	return $data;
    }

    public static function getDataById($id)
    {
    	//return Post::find($id)->toArray();
    	// DB::table('posts')->where('id',$id)->first();
    	$data = Post::find($id);
    	$data = ($data) ? $data->toArray() : [];
    	return $data;
    }
}
