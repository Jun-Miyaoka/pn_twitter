@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <h1>Tweets</h1>
              <ul>
                @foreach ($posts as $post)
                <li>
                  {{ $post->user_id }}</br>
                  {{ $post->body }}</br>
                  {{ $post->created_at }}
                </li>
                @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>
@endsection
