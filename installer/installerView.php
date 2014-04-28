<h2>ステップ１：データベースを作成する</h2>
<p>SASOが使用するデータベースを作成します。<p>
<ol>
<li>ご自身のサーバのデータベースシステムに空のデータベースを作成して下さい。</li>
</ol>

<h2>ステップ２：config.phpファイルを設定する</h2>
<p>SASOフォルダの中にある「config.php」を編集します。<p>
<ol>
<li>DOCUMENT_ROOTにSASOフォルダの置き場所を入力て下さい。最後が「/」（スラッシュ）で終わるようにして下さい。</li>
<li>PROGRAM_DIRにSASOフォルダの名称を入力して下さい。「/」（スラッシュ）は不要です。</li>
<li>DSNを適切に入力して下さい。当アプリケーションはデータベース接続にPDOを使用しています。デフォルトではMYSQLの設定が入っています。</li>
<li>USERにはデータベースのユーザ名を、PASSWORDにはデータベースのパスワードを入れて下さい。</li>
</ol>

<h2>ステップ３：お名前とログインID、パスワードを入力しインストール</h2>
<p>下記の項目を入力し、インストールして下さい。
<br>ログインIDとパスワードはどこかに書き留めておいて下さい。忘れると、復元できません。<p>

<form method="post" action="installResult.php">
<p>お名前(50字以内)：<input type="text" name="name" maxlength="50" required>日本語可</p>
<p>ログインID(8-20字)：<input type="text" name="id" pattern="^[0-9a-zA-Z-_]+$" maxlength="20" required>半角英数及び「-」(ハイフン)「_」(アンダースコア)</p>
<p>パスワード(8-20字)：<input type="password" name="password" pattern="^[0-9a-zA-Z]+$" maxlength="20" required>半角英数</p>
<p>パスワード確認：<input type="password" name="password_confirm" pattern="^[0-9a-zA-Z]+$" maxlength="20" required></p>
<p><input type="submit" value="インストール"></p>
</form>

