@extends('layouts.login')

@section('content')

<!-- 自分をフォローしている人のみを表示
＝フォローカラムに自分のIDが入ってるデータ -->

<div id="follower-list">
  <h1>Follower list</h1>

@foreach ($follows as $follow)
  <div class="follow-icon">
    <img class="icon" src="./images/{{ $follow->images }}" alt="icon">

  </div>



  @endforeach
</div>


@foreach ($posts as $post)
  @if($post->user_id === $follows->follower)
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
