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
    @foreach ($comment->user()->get() as $user)
    <table class="comment_table">
      <col width="100">
      <col width="250">
      <col width="50">
      <tr>
        <td style="font-size:18px"> {{ $user->name }}</td>
        <td>{{ $comment->created_at }}</td>
        <td>
          <form method="post" action="{{ action('CommentController@destroy', $comment->id) }}" id="form_{{ $comment->id }}">
            {{ method_field('delete') }}
            <a href="#" data-id="{{ $comment->id }}" onclick="deletePost(this);">[×]</a>
          </form>
        </td>
      </tr>
      <tr>
        <td colspan="3">{{ $comment->body }}</td>
      </tr>
    </table>
    @endforeach
    @endforeach
    <br>
    <div class="comment_form">
      <form method="post" action="{{ action('CommentController@store', $post->id) }}">
        <textarea rows="2" cols="30" name="body" placeholder="Comment"></textarea>
        <input style="vertical-align:top;" type="submit" value="Add Comment">
      </form>
    </div>
    <div class="back_to_home">
      <a href="{{ url('/home') }}">Back<br></a>
    </div>
  </div>
</div>


<script>
function deletePost(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection
