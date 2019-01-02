<?php

namespace App\Http\Controllers;

// su dung thu vien DB - ket noi hay truy van du lieu
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Post;

class QueryDbController extends Controller
{
    private $dbPost;
    public function __construct(Post $post)
    {
        //$post = new Post;
        $this->dbPost = $post;
    }

    public function orm()
    {
        //return 'test';
        $data = $this->dbPost->getAllData();
        $data2 = $this->dbPost->getAllDataPost();
        $data3 = Post::getDataById(1);
        dd($data3['id'] ?? []);
        //dd($data, $data2);
        foreach($data2 as $key => $item){
            echo $item['id'];
            echo "<br/>";
        }
    }

    public function index()
    {

    	$admin = DB::table('admins')->get();
    	// SELECT * FROM admins
    
    	// chuyen object laravel ve mang 
    	$admin = json_decode($admin,true);
    	// dd($admin);
    	foreach ($admin as $key => $value) {
    		// echo $value['id'];
    		// echo "<br/>";
    	}

    	$name = DB::table('admins')
    	            ->select('username')
    	            ->where('id',10)
    	            ->first();
    	// get() : lay tat du lieu => tra ve mang da chieu
    	// first(): lay 1 dong du lieu => tra ve mang 1 chieu
    	// SELECT `username` FROM admins WHERE id = 10 LIMIT 1;

        /******************************************/
        $count = DB::table('admins')->count();
        $min = DB::table('admins')->min('id');
        $max = DB::table('admins')->max('id');
        $avg = DB::table('admins')->avg('id');
        // SELECT max(id) from admins
        // SELECT min(id) from admins
        //dd($count, $min, $max, $avg);
        $exits = DB::table('admins')
                    ->where('id',10000)
                    ->exists();

        $notExits =  DB::table('admins')
                    ->where('id',10000)
                    ->doesntExist();

        //dd($exits, $notExits);
        //
        $raw = DB::table('admins')
                    ->select(DB::raw('count(*) as total,id'))
                    ->groupBy('id')
                    ->get();
        $raw2 = DB::table('admins')
                ->whereRaw('id NOT IN (1,2,3)')
                ->get();   
        //dd($raw2);
        $join = DB::table('posts')
                    ->select('posts.*','posts.created_at as created_at_post','comments.*')
                    ->join('comments','comments.id_post','=','posts.id')
                    ->get();
        //dd($join);
        $like = DB::table('admins')
                   ->select('*')
                   ->where('admins.email','like','%T%')
                   ->get();
        //dd($like);
        $between = DB::table('admins')
                    ->whereBetween('id',[3,5])
                    ->get();
        //dd($between);
        $limit = DB::table('admins')
                    ->offset(10) // tu dong thu 10
                    ->limit(5) // toi da 5 dong du lieu
                    ->get();
        //dd($limit);
        $insert = DB::table('comments')->insert([
            'questions' => 'thi is question',
            'id_post' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        $update = DB::table('comments')
                    ->where('id',5)
                    ->update([
                        'questions' => 'thi is demo',
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
        $delete = DB::table('comments')
                    ->where('id',5)
                    ->delete();

        if($delete){
          dd('OK'); 
        } else {
            dd('ERR');
        }

    }
}
