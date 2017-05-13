@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @foreach ($posts as $post)
              <li>
                {{ $post->user_id }}</br>
                {{ $post->body }}</br>
                {{ $post->created_at }}
              </li>
              @endforeach
              </div>
            </div>
        </div>
    </div>
@endsection
