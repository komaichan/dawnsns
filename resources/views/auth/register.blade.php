<!-- 新規ユーザー登録画面 -->


@extends('layouts.logout')
<!-- からレイアウト引継ぎ中 -->

@section('content')
<!-- 引き継いだlayouts.logoutのsectionのところに挿入される箇所 -->

{!! Form::open() !!}

<div class="login-top">
    <h2 class="headline">新規ユーザー登録</h2>

    <div class="user-register">

    {{ csrf_field() }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            {{ Form::label('UserName') }}
            {{ Form::text('username',null, ['class' => 'input', 'placeholder'=>'dawntown']) }}
                @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
            {{ Form::label('MailAddress') }}
            {{ Form::text('mail',null,['class' => 'input', 'placeholder'=>'dawn@dawn.jp']) }}
                @if ($errors->has('mail'))
                    <span class="help-block">
                    <strong>{{ $errors->first('mail') }}</strong>
                    </span>
                @endif
        </div>

    <div class="password-form">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('Password') }}
            {{ Form::password('password',null,['class' => 'input']) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
            {{ Form::label('Password confirm') }}
            {{ Form::password('password-confirm',null,['class' => 'input']) }}
                @if ($errors->has('password-confirm'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                    </span>
                @endif
        </div>
    </div>

    <span class="flex">
        {{ Form::submit('REGISTER', ['class' => 'button']) }}
    </span>

    <p class="under"><a href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
