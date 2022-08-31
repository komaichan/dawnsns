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

}
