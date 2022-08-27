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

    <button type="submit" class="post-btn"><img src="images/post.png"></button>
  </div>
</div>


{!! Form::close() !!}

    @foreach ($posts as $post)
    <div class="tweet-container">
      <div class="tweet-list">
            <img class="icon" src="/images/{{ $post->images }}" alt="icon">
          <div class="tweet-column">
              <div class="tweet-time">
                <p>{{ $post->username }}</p>
                <p>{{ $post->created_at }}</p>
              </div>
              <p class="tweet">{{ $post->posts }}</p>
          </div>
      </div>


      <div class="edit-trash">
            <a class="edit" href="/post/{{ $post->id }}/update-form"><img class="edit" src="images/edit.png" alt="edit"></a>
            <a class="trash" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')"></a>
      </div>

    </div>


    @endforeach









@endsection
