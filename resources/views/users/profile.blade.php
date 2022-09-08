@extends('layouts.login')

@section('content')

<img class="icon-img" src="./images/{{ Auth::user()->images }}">

<table>
  <tr>
    <th>UserName</th>
    <td>{!! Form::input('text', 'editPost', Auth::user()->username, ['required', 'class' => 'form-control','autocomplete' => 'off']) !!}</td>
  </tr>
  <tr>
    <th>MailAddress</th>
    <td>{!! Form::input('text', 'editPost', Auth::user()->mail, ['required', 'class' => 'form-control','autocomplete' => 'off']) !!}</td>
  </tr>
  <tr>
    <th>Password</th>
    <td>{!! Form::input('text', 'editPost', Auth::user()->password, ['required', 'class' => 'form-control','autocomplete' => 'off']) !!}</td>
  </tr>
  <tr>
    <th>new Password</th>
    <td></td>
  </tr>
  <tr>
    <th>Bio</th>
    <td></td>
  </tr>
  <tr>
    <th>Icon Image</th>
    <td></td>
  </tr>
</table>




@endsection
