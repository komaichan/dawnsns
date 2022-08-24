<!-- ログイン後トップ画面 -->



@extends('layouts.login')
<!-- ↑のフォルダのレイアウトを引継ぎ中 -->

@section('content')
<!-- 引き継いだlayouts.loginのsectionのところに挿入される箇所 -->


{!! Form::open(['url' => 'post/create']) !!}
<div class="post-container">

  <div class="post">
    <div class="form-group">
      <img class="icon-img" src="images/{{ Auth::user()->images }}">
      {!! Form::input('textarea', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？', 'maxlength' => 150, 'autocomplete' => 'off'] ) !!}
    </div>

    {!! Form::hidden('{{ $user->id }}') !!}

    <button type="submit" class="post-btn"><img src="images/post.png"></button>
  </div>
</div>


{!! Form::close() !!}

      @foreach ($posts as $post)
      <div class="tweet-list">
            <img src="/images/{{ $post->images }}" alt="icon">
          <div class="tweet-column">
              <div class="tweet-time">
                <p>{{ $post->username }}</p>
                <p>{{ $post->created_at }}</p>
              </div>
              <p class="tweet">{{ $post->posts }}</p>
          </div>
      </div>

      @endforeach



@endsection
