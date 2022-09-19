@extends('layouts.login')

@section('content')

<div id="follow-list">
  <h1>Follow list</h1>


  @foreach ($follows as $follow)
  <img class="icon" src="./images/{{ $follow->images }}" alt="icon">



  @endforeach
</div>



@endsection
