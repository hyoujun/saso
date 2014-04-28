<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>のサイズ順番変更</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p>現在のサイズは以下の通りです。</p>
<ul>
<?php foreach($sizemp->findByConcatId($item->concatId) as $value){ ?>
<li><?php echo $value->sizeName; ?></li>
<?php } ?>
</ul>

<p>変更後の順番：</p>
<form method="post" action="<?php echo $this->_linkTo('item/changeSizeOrderSave/'); ?>">
<ul>
<?php foreach($sizemp->findByConcatId($item->concatId) as $value){ ?>
<li><input type="text" class="input-mini" name="<?php echo $value->sizeCode; ?>" pattern="^[0-9]+$" maxlength="2" value="<?php echo $value->orderNumber; ?>"><?php echo $value->sizeName; ?></li>
<?php } ?>
</ul>
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<p><input type="submit" value="サイズ順番変更"></p>
</form>

