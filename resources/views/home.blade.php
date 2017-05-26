@extends('layouts.app')

@section('content')
<div class="home_contents">
  <!-- 左カラム上(ユーザ情報) -->
  <div class="user_menu">
    <div class="auth_user_box">
    <div class="home_auth_user"> {{ Auth::user()->name}} </div>
    <table class="home_auth_table">
      <col width="120">
      <col width="120">
      <tr>
        <td>Tweets</td>
        <td>Following</td>
      </tr>
      <tr>
        <td>ツイート数</td>
        <td>フォロー数</td>
      </tr>
    </table>
  </div>
    <!-- 左カラム下(他のユーザ一覧) -->
    <div class="user_info_box">
    <table class="home_users_table">
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
  </div>
  @if (session('flash_message'))
  <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
  @endif
</div>
  <!-- 右カラム上(ツイート) -->
  <div class="tweet_menu">
    <div class="tweet_box">
      <form method="post" action="{{ url('/posts') }}">
        <p>
          <textarea rows="3" cols="40" name="body" placeholder="Whats happening?"></textarea>
          <input type="submit" value="Tweet">
          @if ($errors->has('body'))
          <span class="error">{{ $errors->first('body') }}</span>
          @endif
        </p>
      </form>
    </div>
    <!-- 右カラム下(タイムライン) -->
    <div class="timeline_box">
      @foreach ($posts as $post)
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
        <tr>
          <td colspan="2"><a href="{{ url('/comment', $post->id) }}">Comment<br></a></td>
        </tr>
      </table>
      @endforeach
      @endforeach
    </div>
  </div>
</div>
@endsection
