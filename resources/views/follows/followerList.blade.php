@extends('layouts.login')

@section('content')

<!-- 自分をフォローしている人のみを表示
＝フォローカラムに自分のIDが入ってるデータ -->

<div id="follower-list">
  <h1>Follower list</h1>


  @foreach ($follows as $follow)
    @if($follow->follow === Auth::user()->id)
  <div class="follow-icon">
    <a href="/posts/{{ $follow->follow }}/profile"><img class="icon" src="./images/{{ $follow->images }}" alt="icon"></a>

  </div>
    @endif
  @endforeach
</div>


@foreach ($posts as $post)
  @if($follow->follow === Auth::user()->id)
    <div class="tweet-container">
        <div class="tweet-list">
              <a href="/posts/{{ $post->user_id }}/profile"><img class="icon" src="./images/{{ $post->images }}" alt="icon"></a>
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
