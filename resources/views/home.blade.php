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

            <ul type="square" align="center">
              <h1 > User </h1>
              <table height="200" align="center">
                <col width="100">
                <col width="100">
                @foreach ($users as $user)
                <tr>
                <td align="center"><a href="{{ url('/user/tweet', $user->id) }}">{{ $user->name }}</a></td>
                <td align="center">
                  @if($user->id == Auth::id())
                  @else
                    <form method="post" action="{{ url('/follow', $user->id) }}">
                    <input type=submit value="Follow">
                    </form>
                  @endif
                </td>
              </tr>
              @endforeach
              </table>
              @if (session('flash_message'))
              <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
              @endif
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
