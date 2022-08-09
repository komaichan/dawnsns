<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function
    Validator::make(
        $data,
        [
            'UserName' => ['required', 'between:4,12'],
            'MailAddress' => ['required', 'email', 'between:4,12','unique:users'],
            'Password' => ['required', 'between:4,12','alpha_num','unique:users'],
            'Password confirm' => ['required', 'between:4,12','alpha_num','same:password'],
        ],


        );
}
