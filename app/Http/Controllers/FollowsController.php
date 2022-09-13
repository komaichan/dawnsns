<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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
