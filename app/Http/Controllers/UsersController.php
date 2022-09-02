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
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')
        ->select('users.username', 'users.images')
        ->get();
        return view('users.search', compact('users'));
    }


    public function searchForm(Request $request){
        $users = DB::table('users')
        ->select('users.username')
        ->get();

        $search = $request->input('search');

        $query = User::query();

        if(!empty($search)) {
            $query->where('username', 'like', '%'.$search.'%');

            $users = $query;
        }
        return redirect('users.search')
        ->with([
                'users' => $users,
                'search' => $search,]);
    }

}
