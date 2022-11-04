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

        // ログインコントローラーでセッションに保存した「passwordCount」を取得
        $passwordCount = session()->get('passwordCount');
        // passwordCountの数値の分だけ「●」を繰り返す
        $password = str_repeat('●', $passwordCount);


        $followCount = DB::table('follows')
            ->where('follows.follower', Auth::id())
            ->count();

        $followerCount = DB::table('follows')
            ->where('follows.follow', Auth::id())
            ->count();

        return view('users.profile', compact('password', 'followerCount', 'followCount'));
    }

    public function update(Request $request){

        $username = $request->input('username');
        $mail = $request->input('mail');
        $newPassword = $request->input('newPassword');
        $bio = $request->input('bio');
        $image = $request->file('image');

        if($newPassword != NULL){

        DB::table('users')
            ->where('id', Auth::id())
            ->update(
                ['Password' => bcrypt($newPassword)]
            );
        }
        // bcryptでハッシュ化する

        if($image != NULL){

        $file_name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/img', $file_name);
        $image = User::find(\Auth::id());
        $image->image = basename($path); //imageカラムに保存
        $image->save();

        DB::table('users')
            ->where('id', Auth::id())
            ->update(
                ['images' => $image]
            );
        }
        dd($image);

        DB::table('users')
        ->where('id', Auth::id())
        ->update(
            ['username' => $username, 'mail' => $mail,'bio' => $bio]
        );

        return redirect('/profile');
    }




    public function search(){
        $users = DB::table('users')
            ->where('users.id', '!=', Auth::id())
            ->select('users.username', 'users.images', 'users.id')
            ->get();

        $followings = DB::table('follows')
            ->where('follower', Auth::id())
            ->select('follow')
            ->get();
        // followerの中でユーザーIDがログインユーザーと一致したfollowを取得


        $followCount = DB::table('follows')
            ->where('follows.follower', Auth::id())
            ->count();

        $followerCount = DB::table('follows')
            ->where('follows.follow', Auth::id())
            ->count();

        return view('users.search', compact('users', 'followings', 'followerCount', 'followCount'));
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

        $followings = DB::table('follows')
            ->where('follower', Auth::id())
            ->select('follow')
            ->get();



        $followCount = DB::table('follows')
            ->where('follows.follower', Auth::id())
            ->count();

        $followerCount = DB::table('follows')
            ->where('follows.follow', Auth::id())
            ->count();

        return view('users.search')
        ->with([
                'users' => $users,
                'search' => $search,
                'followings' => $followings,
                'followerCount' => $followerCount,
                'followCount' => $followCount,]);
    }

}
