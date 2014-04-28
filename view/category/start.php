<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li class=active>分類管理</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('category/editCategory/'); ?>">
<?php require 'view/category/parentList.php'; ?>
<p><input type="submit" value="変更・削除"></p>
</form>

