@extends('layouts.login')

@section('content')

<img class="icon-img" src="./images/{{ Auth::user()->images }}">

<table>
  <tr>
    <th>UserName</th>
    <td>{{ Form::text('placeholder' => {{ Auth:user()->username }}) }}</td>
  </tr>
  <tr>
    <th>MailAdress</th>
    <td></td>
  </tr>
  <tr>
    <th>Password</th>
    <td></td>
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
