20170522<br>
・ツイート削除<br>
ログイン中のユーザのツイートのみ削除可能<br>
<br>
・フォロー済みのユーザかどうかフォロー時に判別<br>



20170519
・コントローラーを2つに分割
HomeContoroller
TweetController

・URLを修正

・ツイート表示形式を変更。
<table>
  <col width="70">
  <col width="500">
  <col width="100">
  <tr>
    <td>{{ $user->name }}</td>
    <td>{{ $post->body }}</td>
    <td>{{ $post->created_at }}</td>
  </tr>
</table>

