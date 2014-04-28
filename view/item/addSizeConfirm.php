<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/addSize/' . $item->concatId); ?>"><?php echo $item->itemName; ?>のサイズ追加</a> <span class="divider">&gt;</span></li>
<li class="active">サイズ追加確認</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p>以下の内容を登録します。</p>
<form method="post" action="<?php echo $this->_linkTo('item/addSizeSave'); ?>">
<table class="table table-striped">
<tr>
<td>商品詳細番号</td>
<td>商品名</td>
<td>色</td>
<td>サイズ</td>
</tr>
<?php
foreach($colormp->findByConcatId($item->concatId) as $colorValue){
    foreach($sizeNameArray as $value){
?>
<tr>
<td><?php echo $item->concatId . $colorValue->colorCode . $value; ?>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $colorValue->colorName . '(' . $colorValue->colorCode . ')'; ?></td>
<td><?php echo $value; ?>
</tr>
<?php
    }
}
?>
</table>
<input type="hidden" name="sizeName" value="<?php echo $post->getRequest('sizeName'); ?>">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>"></td>
<p><input type="submit" value="確定"></p>
</form>

