@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <table class="tweet_table" border=1>
              @foreach ($posts as $post)
              <tr><td>{{ $post->user_id }}</td><td>{{ $post->body }}</td><td>{{ $post->created_at }}</td></tr>
              @endforeach
            </table>
              </div>
            </div>
        </div>
    </div>
@endsection
