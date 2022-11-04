<!-- ログイン後トップ画面 -->



@extends('layouts.login')
<!-- ↑のフォルダのレイアウトを引継ぎ中 -->

@section('content')
<!-- 引き継いだlayouts.loginのsectionのところに挿入される箇所 -->


{!! Form::open(['url' => 'post/create']) !!}
<div class="post-container">

  <div class="post">
    <div class="form-group">
      <img class="icon-img" src="./images/{{ Auth::user()->images }}">
      <textarea name="newPost" required class="form-control" placeholder="何をつぶやこうか…？"></textarea>
    </div>

    <button type="submit" class="post-btn"><img src="images/post.png"></button>
  </div>

</div>


{!! Form::close() !!}

    @foreach ($posts as $post)
    <div class="tweet-container">

      <div class="tweet-list">
            <img class="icon" src="./images/{{ $post->images }}" alt="icon">
          <div class="tweet-column">
              <div class="tweet-time">
                <p>{{ $post->username }}</p>
                <p>{{ $post->created_at }}</p>
              </div>
              <p class="tweet">{{ $post->posts }}</p>
          </div>
      </div>


      @if($post->user_id === Auth::user()->id)
      <div class="edit-trash">

            <button class="edit-link" data-toggle="modal" data-target="#Modal" data-whatever="{{ $post->posts }}" data-post-id="{{ $post->id }}">
              <img class="edit" src="images/edit.png" alt="edit">
            </button>

            {!! Form::open(['url' => 'post/edit', 'id' => $post->id]) !!}
                <div class="edit-form" id="Modal" >
                  <span class="edit-text">
                    {!! Form::hidden('id', null, ['class' => 'postId']) !!}
                    {!! Form::input('textarea', 'editPost', $post->posts, ['required', 'class' => 'form-control','autocomplete' => 'off']) !!}
                    <button type="submit" class="post-btn"><img src="images/edit.png"></button>
                  </span>
                </div>
              {!! Form::close() !!}

            <a class="trash" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')"></a>
      </div>
      @endif

    </div>


    @endforeach




@endsection
