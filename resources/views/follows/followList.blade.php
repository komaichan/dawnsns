@extends('layouts.login')

@section('content')


<div id="follow-list">
  <h1>Follow list</h1>

  <div class="follow-icon-image">

  @foreach ($follows as $follow)
    @if($follow->follower === Auth::user()->id)

      <div class="follow-icon">
        <a href="/posts/{{ $follow->follow }}/profile"><img class="icon" src="./images/{{ $follow->images }}" alt="icon"></a>
      </div>
    @endif
  @endforeach

  </div>
</div>


@foreach ($posts as $post)
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

@endforeach



@endsection
