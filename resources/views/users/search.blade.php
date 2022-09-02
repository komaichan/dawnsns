@extends('layouts.login')

@section('content')


<div class="search-container">

  {!! Form::open(['url' => 'user/search-form']) !!}
  {{ csrf_field()}}

  {!! Form::input('text', 'search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名', 'autocomplete' => 'off'] ) !!}
  <button type="submit" class="post-btn"><img src="images/post.png"></button>

  {!! Form::close() !!}

</div>



@foreach ($users as $user)
<div class="user-list">
  <div class="user-container">
    <img class="icon" src="/images/{{ $user->images }}" alt="icon">
    <p>{{ $user->username }}</p>
  </div>

  <button>フォローする</button>
</div>

@endforeach


@endsection
