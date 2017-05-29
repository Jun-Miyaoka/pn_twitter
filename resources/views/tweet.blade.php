@extends('layouts.app')

@section('content')
<div class="comment_contents">
  @if (session('flash_message'))
  <div class="tweet_flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
  @endif
  <div class="timeline_box">
    @forelse ($posts as $post)
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
          <form method="post" action="{{ action('TweetController@destroy', $post->id) }}" id="form_{{ $post->id }}">
            {{ method_field('delete') }}
            <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);">[×]</a>
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
    @empty
    <div class="no_post">No posts yet</div>
    @endforelse
  </div>
  <div class="back_to_home">
    <a href="{{ url('/home') }}">Back<br></a>
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
