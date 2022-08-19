@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-welcome">
    <p class="added-username">{{ session('username') }}さん</p>
    <p>ようこそ！DAWNSNSへ！</p>
  </div>

<div class="added-p">
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう</p>
</div>

<p class="flex"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
