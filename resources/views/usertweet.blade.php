@extends('layouts.app')

@section('content')
<div class="comment_contents">
  <div class="timeline_box">
    @foreach ($posts as $post)
    @foreach ($post->user()->get() as $user)
    <table class="tweet_table">
      <col width="150">
      <col width="300">
      <col width="50">
      <tr>
        <td style="font-size:20px">{{ $user->name }}</td>
        <td>{{ $post->created_at }}</td>
        <td>
          @if ($user->id == Auth::id())
          <form method="post" action="{{ action('TweetController@destroy', $post->id) }}">
            <input type=submit value="[×]" class="input_button">
          </form>
          @endif
        </td>
      </tr>
      <tr>
        <td colspan="3">{{ $post->body }}</td>
      </tr>
      <tr>
        <td colspan="3"><a href="{{ url('/comment', $post->id) }}">Comment<br></a></td>
      </tr>
    </table>
    @endforeach
    @endforeach
  </div>
  <div class="back_to_home">
    <a href="{{ url('/home') }}">Back<br></a>
  </div>
</div>

@endsection
