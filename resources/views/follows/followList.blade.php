@extends('layouts.login')

@section('content')

<!-- フォローリストはログインユーザーのフォローしているユーザーを表示するので、
フォロワーIDはログインユーザーのID
フォローIDはログインしているユーザーがフォローしているユーザーのIDだから、
Auth::user.id＝follows.follower
ログインしているユーザーとフォロワーのIDが一致するフォローIDのユーザーだけ表示する -->

<div id="follow-list">
  <h1>Follow list</h1>


  @foreach ($follows as $follow)
  <div class="follow-icon">
    <a href="/posts/{{ $follow->id }}/profile"><img class="icon" src="./images/{{ $follow->images }}" alt="icon"></a>

  </div>

  @endforeach
</div>


@foreach ($posts as $post)
  @if($post->user_id !== Auth::user()->id)
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
    </div>

    @endif
@endforeach



@endsection
