<!-- ログイン後トップ画面 -->



@extends('layouts.login')
<!-- ↑のフォルダのレイアウトを引継ぎ中 -->

@section('content')
<!-- 引き継いだlayouts.loginのsectionのところに挿入される箇所 -->


{!! Form::open(['url' => 'post/create']) !!}
<div class="post-container">

  <div class="post">
    <div class="form-group">
      <img class="icon-img" src="images/dawn.png">
      {!! Form::input('textarea', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？', 'maxlength' => 150, 'autocomplete' => 'off'] ) !!}
    </div>
    <button type="submit" class="post-btn"><img src="images/post.png"></button>
  </div>
</div>
{!! Form::close() !!}

      @foreach ($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->post }}</td>
        <td>{{ $post->created_at }}</td>

      @endforeach



@endsection
