<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }



       public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'post' => $post
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
}
