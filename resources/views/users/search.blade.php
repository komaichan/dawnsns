@extends('layouts.login')

@section('content')


{!! Form::open(['url' => 'user/search-form']) !!}
<div class="search-container">
  {{ csrf_field()}}

  @if(isset($search))

  {!! Form::input('text', 'search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名', 'autocomplete' => 'off'] ) !!}
  <button type="submit" class="post-btn"><img src="images/post.png"></button>

</div>
@endif
{!! Form::close() !!}



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
