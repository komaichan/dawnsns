@extends('layouts.logout')

<!-- <p>Social Network Service</p> -->

@section('content')

{!! Form::open() !!}

<div class="login-top">
<h2 class="headline">DAWNSNSへようこそ</h2>

{{ csrf_field() }}

<div class="login-form">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::label('MailAddress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
        @if ($errors->has('email'))
            <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('Password') }}
    {{ Form::password('password',['class' => 'input']) }}
        @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <span class="flex">
    {{ Form::submit('LOGIN', ['class' => 'button']) }}
    </span>

        <p class="under"><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
</div>

{!! Form::close() !!}

@endsection
