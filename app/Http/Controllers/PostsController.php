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
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follow')
            ->where('follows.follower', Auth::id())
            ->orWhere('posts.user_id', Auth::id())
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images', 'follows.follower')
            ->get()
            ->sortByDesc('created_at');


        $followCount = DB::table('follows')
            ->where('follows.follower', Auth::id())
            ->count();

        $followerCount = DB::table('follows')
            ->where('follows.follow', Auth::id())
            ->count();

        return view('posts.index', compact('posts', 'followerCount', 'followCount'));
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



        public function edit(Request $request)
    {
        $edit_post = $request->input('editPost');
        $id = $request->input('id');

        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $edit_post]
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

    public function test()
    {
        $test = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->where('posts.user_id', '=', Auth::id())
        ->select('posts.posts')
        ->get();

        return view('users.test', compact('test'));
    }
}
