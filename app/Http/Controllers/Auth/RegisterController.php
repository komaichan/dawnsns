<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    //  バリデーションなどのファザードを使う時はconfig.app.phpにサービスプロバイダーと、FromとHtmlの記述を追加する

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required|between:min4,max12'],
            'mail' => ['required|email|between:min4,max12|unique:users'],
            'password' => ['required|between:min4,max12|unique:users|alpha_num'],
            'password-confirm' => ['required|between:min4,max12|unique:users|confirmed|alpha_num'],

        ],
        [
            'username.required' => '入力必須です',
            'username.between:min4,max12' => '4文字以上12文字以内で入力してください',
            'mail.required' => '入力必須です',
            'mail.email' => 'メールアドレスを入力してください',
            'mail.between:min4,max12' => '4文字以上12文字以内で入力してください',
            'mail.unique:users' => '既に登録されているアドレスです',
            'password.required' => '入力必須です',
            'password.between:min4,max12' => '4文字以上12文字以内で入力してください',
            'password.unique:users' => '既に登録されているパスワードです',
            'password.alpha_num' => '使用できるのは英数字のみです',
            'password-confirm.required' => '入力必須です',
            'password-confirm.between:min4,max12' => '4文字以上12文字以内で入力してください',
            'password-confirm.unique:users' => '既に登録されているパスワードです',
            'password-confirm.confirmed' => 'パスワードが一致しません',
            'password-confirm.alpha_num' => '使用できるのは英数字のみです',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            $this-validator($data)->validate();
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
