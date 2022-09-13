@extends('layouts.login')

@section('content')

<div id="profile">
  <img class="icon-img" src="./images/{{ Auth::user()->images }}">

  <div class="profile-update">
    {!! Form::open(['url' => 'profile/update']) !!}

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
        <td><input type="password" class="profile-form" name="newPassword" null>
        </td>
      </tr>
      <tr>
        <th>Bio</th>
        <td><input type="textarea" class="profile-form bio" name="bio" null></input></td>
      </tr>
      <tr>
        <th>Icon Image</th>
        <td><div id="profile-image"></div>
        <input  id="example" type="file" name="file" accept="image/*" multiple null></td>
      </tr>
    </table>

    <button type="submit" class="profile-btn">更 新</button>

    {!! Form::close() !!}
</div>

</div>



@endsection
