<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;




class UsersController extends Controller
{
    //
    public function profile(){
        $user = DB::table('users')
        ->get();
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')

        ->select('users.username', 'users.images', 'users.id')
        ->get();

        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->select('follow')
        ->get();

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
