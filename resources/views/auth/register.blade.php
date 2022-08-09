@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null, ['class' => 'input', 'placeholder'=>'dawntown']) }}

{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input', 'placeholder'=>'dawn@dawn.jp']) }}

{{ Form::label('Password') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('Password confirm') }}
{{ Form::password('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
