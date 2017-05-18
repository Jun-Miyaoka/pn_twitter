@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="home_menu">
              <form method="post" action="{{ url('/posts') }}">
              <p>
                <textarea rows="3" cols="40" name="body" placeholder="Whats happening?"></textarea>
              </p>
              <p>
                <input type="submit" value="Tweet">
              </p>
            </form>
            <ul type="square">
              <h1> Users </h1>
                @foreach ($users as $user)
                  <a href="{{ url('/user/tweet', $user->id) }}">{{ $user->name }}<br></a>
                @endforeach
              <h1> Follow </h1>
              @foreach ($users as $user)
              <form method="post" action="{{ url('/follow', $user->id) }}">
                <input type=submit value="Follow">
                {{ $user->name }}
              </form>
              @endforeach
              <h1>Tweet</h1>
              <a href="{{ url('/follow/tweet', Auth::id()) }}">Follow users<br></a>
              <a href="{{ url('/tweet') }}">All users</a>
              </ul>
            </div>
              </div>
            </div>
        </div>
    </div>
@endsection
