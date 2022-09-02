<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;




class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')
        ->select('users.username', 'users.images')
        ->get();
        return view('users.search', compact('users'));
    }


    public function searchForm(Request $request){
        $search = $request->input('search');

        $user = Auth::user();

        if(!empty($search)) {
            $user->where('username', 'LIKE', '%{search}%');
        };
        return redirect('users.search', compact('search'));
    }

}
