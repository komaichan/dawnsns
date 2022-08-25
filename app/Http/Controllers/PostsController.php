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
        $post = $request->input('newPost','id');
        DB::table('posts')->insert([
            'newPost' => $post['posts'],
            'id' => $post['user_id']
        ]);

        return redirect('/top');
    }

    // public function updateForm()
    // {
    //     $post = DB::table('posts')
    //         ->where('id', 1)
    //         ->first();
    //     return view('posts.updateForm', compact('post'));
    // }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
