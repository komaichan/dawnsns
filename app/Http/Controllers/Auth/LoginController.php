<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mail' => 'required|email|between:4,12|unique:users',
            'password' => 'required|between:4,12|unique:users|alpha_num',
        ],
        [
            'mail.required' => '入力必須です',
            'mail.email' => 'メールアドレスを入力してください',
            'mail.between' => '4文字以上12文字以内で入力してください',
            'password.required' => '入力必須です',
            'password.between' => '4文字以上12文字以内で入力してください',
            'password.unique' => '既に登録されているパスワードです',
            'password.alpha_num' => '使用できるのは英数字のみです'
        ]
    );
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');

            $_SESSION[mb_strlen('password')];

            $this->validator($data);
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top', compact('password'));
            }
        }
        return view("auth.login");
    }

    protected function loggedOut(\Illuminate\Http\Request $request) {
      return redirect('login');
    }
    // ログアウト機能（web.phpと連携)


}
