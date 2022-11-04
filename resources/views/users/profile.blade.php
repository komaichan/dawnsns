@extends('layouts.login')

@section('content')

<div id="profile">
  <img class="icon-img" src="/public/profile_images/{{ Auth::id() }}.jpg">

  <div class="profile-update">
    {!! Form::open(['url' => 'profile/update', 'files' => true, 'enctype' => 'multipart/form-data' ]) !!}

    {{ csrf_field() }}

    <table class="profile-table">
      <tr>
        <th>UserName</th>
        <td>{{ Form::text('username', Auth::user()->username, ['required', 'class' => 'profile-form','autocomplete' => 'off']) }}</td>
      </tr>
      <tr>
        <th>MailAddress</th>
        <td>{{ Form::text('mail', Auth::user()->mail, ['required', 'class' => 'profile-form','autocomplete' => 'off']) }}</td>
      </tr>
      <tr>
        <th>Password</th>
        <td>{{ $password }}</td>
      </tr>
      <tr>
        <th>new Password</th>
        <td><input type="password" class="profile-form" name="newPassword">
        </td>
      </tr>
      <tr>
        <th>Bio</th>
        <td>
        {{ Form::textarea('bio', Auth::user()->bio, ['class' => 'profile-form bio']) }}
      </tr>
      <tr>
        <th>Icon Image</th>
        <td>
          <label class="">ファイルを選択
            {{ Form::file('image', ['class' => 'custom-file-input']) }}
          </label>
        </td>
      </tr>

    </table>

    <button type="submit" class="profile-btn">更 新</button>

    {!! Form::close() !!}
  </div>

</div>



@endsection
