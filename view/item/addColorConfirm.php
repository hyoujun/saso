<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/addColor/' . $item->concatId); ?>"><?php echo $item->itemName; ?>の色追加</a> <span class="divider">&gt;</span></li>
<li class="active">色追加確認</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p>以下の内容を登録します。</p>
<form method="post" action="<?php echo $this->_linkTo('item/addColorSave'); ?>">
<table class="table table-striped">
<tr>
<td>商品詳細番号</td>
<td>商品名</td>
<td>色</td>
<td>サイズ</td>
</tr>
<?php
foreach($colorNameArray as $key => $value){
    foreach($sizemp->findByConcatId($item->concatId) as $sizeValue){
?>
<tr>
<td><?php echo $item->concatId . $key . $sizeValue->sizeCode; ?>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $value . '(' . $key . ')'; ?></td>
<td><?php echo $sizeValue->sizeName; ?>
</tr>
<?php
    }
}
?>
</table>
<input type="hidden" name="colorName" value="<?php echo $post->getRequest('colorName'); ?>">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<p><input type="submit" value="確定"></p>
</form>

