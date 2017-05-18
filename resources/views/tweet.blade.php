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
                @foreach ($users as $user)
                @foreach ($user->posts()->orderBy('created_at','desc')->get() as $post)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $post->body }}</td>
                  <td>{{ $post->created_at }}</td>
                </tr>
                @endforeach
                @endforeach
                </table>
              <div class="back_to_home">
              <a href="{{ url('/home') }}">Back<br></a>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
