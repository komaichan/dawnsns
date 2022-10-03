@extends('layouts.login')

@section('content')

@foreach ($users as $user)
<div class="profile-header">
<div class="user-profile">
  <img class="icon-img" src="{{ asset('images/' . $user->images) }}">

  <table class="profile-menu">
    <tr>
      <th>Name</th>
      <td class="td-name">{{ $user->username }}</td>
    </tr>
    <tr>
      <th>Bio</th>
      <td class="td-bio">{{ $user->bio }}</td>
    </tr>
  </table>
</div>

  @if($followings->contains('follow',$user->id))
  <!-- containsメソッドは指定したアイテムがコレクションに含まれているかどうか -->

  {!! Form::open(['url' => '/remove']) !!}
  {!! Form::hidden('id', $user->id) !!}
  {{ csrf_field()}}
  <button class="remove-button">フォローをはずす</button>
  {!! Form::close() !!}


  @else

  {!! Form::open(['url' => '/follow']) !!}
  {!! Form::hidden('id', $user->id) !!}
  {{ csrf_field()}}
  <button class="follow-button">フォローする</button>
  {!! Form::close() !!}

  @endif

@endforeach

</div>

@foreach ($posts as $post)
  <div class="tweet-container">
    <div class="tweet-list">
      <img class="icon" src="{{ asset('images/' . $post->images) }}" alt="icon">
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
