@extends('layouts.app')

@section('content')
<div class="comment_contents">
  <div class="tweet_menu">
    <!--ツイート-->
    @foreach ($post->user()->get() as $user)
    <table class="tweet_table">
      <col width="150">
      <col width="350">
      <tr>
        <td style="font-size:20px">{{ $user->name }}</td>
        <td>{{ $post->created_at }}</td>
      </tr>
      <tr>
        <td colspan="2">{{ $post->body }}</td>
      </tr>
    </table><br>
    @endforeach
    <!--コメント一覧-->
    @foreach ($comments as $comment)
    <table class="comment_table">
      <col width="100">
      <col width="250">
      <col width="50">
      <tr>
        <td style="font-size:18px"> name </td>
        <td>{{ $comment->created_at }}</td>
        <td>
          <form method="post" action="{{ action('CommentController@destroy', $comment->id) }}" method="post">
            <input type=submit value="[×]" class="input_button">
          </td>
        </tr>
        <tr>
          <td colspan="3">{{ $comment->body }}</td>
        </tr>
      </table>
      @endforeach
      <br>
      <div class="comment_form">
      <form method="post" action="{{ action('CommentController@store', $post->id) }}">
        <textarea rows="1" cols="20" name="body" placeholder="Comment"></textarea>
        <input style="vertical-align:top;" type="submit" value="Add Comment">
      </form>
    </div>
      <div class="back_to_home">
        <a href="{{ url('/home') }}">Back<br></a>
      </div>
    </div>
  </div>
  @endsection
