<?php if('1' == $url->getRequest('success')){ ?>
<p class="text-success">パスワードが変更されました。</p>
<?php } ?>
<p>パスワードはどこかに書き留めておいて下さい。忘れると、復元できません。<p>
<form method="post" action="<?php echo $this->_linkTo('start/changePasswordSave/'); ?>">
<p>現在のパスワード：<input type="password" name="now" pattern="^[0-9a-zA-Z]+$" maxlength="20" required><p>
<?php if('now' == $url->getRequest('error')){ ?>
<p class="text-error">現在のパスワードが正しくありません。</p>
<?php } ?>
<hr>
<p>新しいパスワード：<input type="password" name="new" pattern="^[0-9a-zA-Z]+$" maxlength="20" required>（半角英数、8〜20文字）<p>
<?php if('new' == $url->getRequest('error')){ ?>
<p class="text-error">パスワードが短すぎます。</p>
<?php } ?>
<p>パスワード確認：<input type="password" name="confirm" pattern="^[0-9a-zA-Z]+$" maxlength="20" required><p>
<?php if('confirm' == $url->getRequest('error')){ ?>
<p class="text-error">パスワードが一致しません。</p>
<?php } ?>
<p><input type="submit" value="パスワード変更"><p>
</form>
