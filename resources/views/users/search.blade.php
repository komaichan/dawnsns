@extends('layouts.login')

@section('content')


<div class="search-container">

<div class="search-text">
  {!! Form::open(['url' => 'user/search-form']) !!}
  {{ csrf_field()}}

  {!! Form::input('text', 'search', null, ['required', 'class' => 'search-form', 'placeholder' => 'ユーザー名', 'autocomplete' => 'off'] ) !!}
  <button type="submit" class="post-btn"><img src="{{ asset('images/post.png') }}"></button>
</div>


  {!! Form::close() !!}

  @if(isset($search))
  <p class="search-word">検索ワード：{{ $search }}</p>

  @endif

</div>



@foreach ($users as $user)

<div class="user-list">
  <div class="user-container">
    <img class="icon" src="/images/{{ $user->images }}" alt="icon">
    <p>{{ $user->username }}</p>
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
</div>

@endforeach


@endsection


ちなったん
なぎさ
ほのか
いじゅういんめぐみ
大石泉
おおたゆう
くるみ
くらりす
みちる
ちあき
ちえ
しのはられい
そうまなつみ
みやび
あい
めいこ
えみ
しほ
さやや
あずき
みう
きよら
