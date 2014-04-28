<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>の分類変更</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p>現在の分類は以下の通りです。</p>
<p><?php echo $categorymp->getPath($ivmp->findByConcatId($item->concatId)->categoryId); ?></p>
<p>変更後の分類：</p>
<form method="post" action="<?php echo $this->_linkTo('item/changeCategorySave/'); ?>">
<?php require 'view/category/parentList.php'; ?>
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<p><input type="submit" value="分類変更"></p>
</form>

