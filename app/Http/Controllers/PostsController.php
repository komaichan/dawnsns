<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
// ↑Auth使えるようにするよ

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        return view('posts.index', compact('posts'));
    }
    // topにuserの情報をpostに乗っける




    public function __construct()
    {
        $this->middleware('auth');
    }



       public function create(Request $request)
    {
        $post = $request->input('newPost');
        $id = Auth::id();

        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => $id
        ]);

        return redirect('/top');
    }


        public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
        // 取得するレコードの条件を指定する
            ->first();
        // 複数のデータを取得するget ≠ 1行のデータのみを取得するfirst
        return view('posts.updateForm',['post'=>$post]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
        ->where('id', $id)
        ->update(
            ['post' => $up_post]
        );

        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
