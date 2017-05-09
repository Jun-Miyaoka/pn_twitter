@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <form method="post" action="{{ url('/posts') }}">
              <p>
                <textarea rows="3" cols="40" name="body" placeholder="Whats happening?"></textarea>
              </p>
              <p>
                <input type="submit" value="Tweet">
              </p>
            </form>
            <li>{{ Auth::user()->name }}</li>
              <h1>Users</h1>
              <ul>
                @foreach ($users as $user)
                <li><a href="">{{ $user->name }}</a></li>
                @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>
@endsection
