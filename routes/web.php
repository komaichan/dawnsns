<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');





//新規登録のルーティング
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// post通信で/registerがきたら、Auth\RegisterControllerの中にあるregisterメソッドを実行

Route::get('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');


//　検索
Route::get('/search','UsersController@search');

Route::post('user/search-form','UsersController@searchForm');


// フォロー関連
Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::post('/remove', 'FollowsController@remove');
Route::post('/follow', 'FollowsController@follow');



//----- post create -----

Route::post('post/create', 'PostsController@create');
//   {!! Form::open(['url' => 'post/create']) !!}のurlを第1引数に指定
// 　public function createを第2引数において実行



//----- post編集-----
Route::post('post/edit', 'PostsController@edit');


//----- post delete -----

Route::get('/post/{id}/delete', 'PostsController@delete');
