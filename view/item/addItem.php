<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active">商品登録</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('item/addItemConfirm/'); ?>">
<p>分類：</p>
<?php require 'view/category/parentList.php'; ?>
<p>商品名(50字以内)：<input type="text" name="itemName" maxlength="50" required></p>
<p>価格：<input type="text" name="price" pattern="^[0-9]+$" maxlength="10"></p>
<p>色：<input type="text" name="colorName" required>※複数入力する場合は半角カンマ（,）で区切って下さい。</p>
<p>サイズ：<input type="text" name="sizeName" required>※複数入力する場合は半角カンマ（,）で区切って下さい。</p>
<p>梱包</p>
<p><input type="checkbox" name="pla" value="1">プラ<input type="text" name="plaNote" maxlength="50"></p>
<p><input type="checkbox" name="paper" value="1">紙<input type="text" name="paperNote" maxlength="50"></p>
<p><input type="submit" value="登録確認"></p>
</form>

