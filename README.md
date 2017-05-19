20170519
・コントローラーを2つに分割
HomeContoroller
TweetController

・URLを修正

・ツイート表示形式を変更。
<table>
  <tr>
    <td>{{ $user->name }}</td>
    <td>{{ $post->body }}</td>
    <td>{{ $post->created_at }}</td>
  </tr>
</table>

