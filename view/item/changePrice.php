<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>の価格変更</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p>現在の価格は以下の通りです。</p>
<p><?php echo $ivmp->findByConcatId($item->concatId)->price; ?></p>
<p>変更後の価格：</p>
<form method="post" action="<?php echo $this->_linkTo('item/changePriceSave/'); ?>">
<p><input type="text" name="price" pattern="^[0-9]+$" maxlength="10" value="<?php echo $ivmp->findByConcatId($item->concatId)->price; ?>"></p>
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<p><input type="submit" value="価格変更"></p>
</form>

