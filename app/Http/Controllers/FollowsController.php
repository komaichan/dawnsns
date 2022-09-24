<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follows = DB::table('follows')
        ->join('users','follows.follower', '=', 'users.id')
        ->select('users.images', 'follows.follower', 'follows.follow')
        ->get();

        $posts = DB::table('posts')
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'follows.follower', 'follows.follow', 'users.username', 'users.images')
            ->get();

        return view('follows.followList', compact('follows','posts'));

    }


    public function followerList(){
        $follows = DB::table('follows')
        ->join('users','follows.follow', '=', 'users.id')
        ->select('users.images', 'follows.follower', 'follows.follow')
        ->get();

        $posts = DB::table('posts')
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'follows.follower', 'follows.follow', 'users.username', 'users.images')
            ->get();

        return view('follows.followerList', compact('follows','posts'));

    }

    public function profile() {
        $user = DB::table('users')
        ->get();

        return view('posts.profile', compact('user'));
    }


    public function follow(Request $request) {
        $id = Auth::id();
        $user_id = $request->input('id');

        DB::table('follows')->insert([
        'follow' => $user_id,
        'follower' => $id
        ]);

        return redirect('/search');
    }

    public function remove(Request $request) {
        DB::table('follows')
        ->where('follow', $request->id)
        ->where('follower', Auth::id())
        ->delete();
        // 選択された人のidがfollowカラムに入っていて、かつ、自分のidがfollowerカラムに入っていることが条件
        return redirect('/search');
    }
}
