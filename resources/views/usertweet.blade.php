@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="home_menu">
                <h1>Tweets</h1>
                <table>
                  <col width="70">
                  <col width="500">
                  <col width="100">
                  @foreach ($posts as $post)
                  @foreach ($post->user()->get() as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                    @if ($user->id == Auth::id())
                    <form method="post" action="{{ action('TweetController@destroy', $post->id) }}" method="post">
                    <input type=submit value="Delete">
                    </form>
                    @endif
                    </td>
                  </tr>
                  @endforeach
                  @endforeach
                </table>
          </div>
              </div>
              <div class="back_to_home">
              <a href="{{ url('/home') }}">Back<br></a>
            </div>
        </div>
    </div>
@endsection
