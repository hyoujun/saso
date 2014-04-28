<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>のサイズ追加</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p><?php echo $item->concatId; ?>『<?php echo $item->itemName; ?>』には以下のサイズが登録されています。</p>
<ul>
<?php foreach($sizemp->findByConcatId($item->concatId) as $value){ ?>
<li><?php echo $value->sizeName; ?></li>
<?php } ?>
</ul>
<form method="post" action="<?php echo $this->_linkTo('item/addSizeConfirm/'); ?>">
<p>追加するサイズ：<input type="text" name="sizeName" required>
<br>※複数入力する場合は半角カンマ（,）で区切って下さい。</p>
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<p><input type="submit" value="登録確認"></p>
</form>

