<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\LoginController;
use App\User;
use Auth;




class UsersController extends Controller
{
    //
    public function profile(){
        $user = DB::table('users')
        ->get();

        // セッションに保存した「passwordCount」を取得
        $passwordCount = session()->get('passwordCount');
        // passwordCountの数値の分だけ「●」を繰り返す
        $password = str_repeat('●', $passwordCount);

        return view('users.profile', compact('password'));
    }

    public function update(Request $request){

        $request = DB::table('users')
        ->where('id', Auth::id())
        ->select('password','bio','images')
        ->get();

        $username = $request->input('username');
        $mail = $request->input('mail');
        $bio = $request->input('bio');
        $image = $request->input('file');

        if($newPassword != NULL){
        $newPassword = $request->input('Password');

        DB::table('users')
        ->where('id', Auth::id())
        ->update(
            ['Password' => $newPassword]
        );
        }

        DB::table('users')
        ->where('id', Auth::id())
        ->update(
            ['username' => $username, 'mail' => $mail,'bio' => $bio, 'images' => $image]
        );

        return redirect('/profile');
    }




    public function search(){
        $users = DB::table('users')

        ->select('users.username', 'users.images', 'users.id')
        ->get();

        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->select('follow')
        ->get();
        // followerの中でユーザーIDがログインユーザーと一致したfollowを取得


        return view('users.search', compact('users', 'followings'));
    }


    public function searchForm(Request $request){
        $users = DB::table('users')
        ->select('users.username')
        ->get();

        $search = $request->input('search');

        $query = User::query();

        if(!empty($search)) {
            $query->where('username', 'like', '%'.$search.'%');
        }
        $users = $query->get();
        return view('users.search')
        ->with([
                'users' => $users,
                'search' => $search,]);
    }

}
