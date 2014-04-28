<script>
function submitCheck(input,submit){
    var flag = confirm(input+"で"+submit+"します。\nよろしいですか？");
    return flag;
}
function isubmitCheck(input,submit){
    var flag = confirm(input+"で"+submit+"します。\nすべての履歴が消去されます。\nよろしいですか？");
    return flag;
}
</script>
<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('quantity/start/'); ?>">数量管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>の数量管理</li>
</ul>

<?php if('1' == $url->getRequest('error')){ ?>
<p class="text-error">※数量以上に出庫できません。</p>
<?php } ?>
<table class="table table-striped">
<tr>
<td>商品詳細番号</td>
<td>商品名</td>
<td>分類</td>
<td>価格</td>
<td>色</td>
<td>サイズ</td>
<td>数量</td>
<td>入庫</td>
<td>出庫</td>
<td>棚卸</td>
<td>棚番</td>
</tr>
<?php
foreach($colormp->findByConcatId($item->concatId) as $colorValue){
    foreach($sizemp->findByConcatId($item->concatId) as $sizeValue){
?>
<tr>
<td>
<?php if(null != $qlmp->sumListByDetaleCode($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)->detaleCode){ ?>
<a href="<?php echo $this->_linkTo('quantity/history/detaleCode/' . $item->concatId . $colorValue->colorCode . $sizeValue->sizeCode); ?>">
<?php echo $item->concatId . $colorValue->colorCode . $sizeValue->sizeCode; ?>
</a>
<?php }else{ echo $item->concatId . $colorValue->colorCode . $sizeValue->sizeCode; } ?>
</td>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $categorymp->getPath($ivmp->findByConcatId($item->concatId)->categoryId); ?></td>
<td><?php echo $ivmp->findByConcatId($item->concatId)->price; ?></td>
<td><a href="<?php echo $this->_linkTo('image/displayImage/item/' . $item->concatId . '/color/' . $colorValue->colorCode); ?>"><?php echo $colorValue->colorName . '(' . $colorValue->colorCode . ')'; ?></a></td>
<td><?php echo $sizeValue->sizeName; ?></td>
<td class="number">
<?php if(null != $qlmp->existInventoryFlag($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)){ echo $qlmp->sumListByDetaleCode($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)->sum ;} ?>
</td>
<?php if(null != $qlmp->existInventoryFlag($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)){ ?>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/stock'); ?>" onsubmit="return submitCheck(stock.value,action.value)">
<input type="text" name="stock" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="入庫">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorValue->colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeValue->sizeCode; ?>">
</form>
</td>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/shipment'); ?>" onsubmit="return submitCheck(shipment.value,action.value)">
<input type="text" name="shipment" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="出庫">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorValue->colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeValue->sizeCode; ?>">
</form>
</td>
<?php }else{ ?>
<td></td><td></td>
<?php } ?>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/inventory'); ?>" onsubmit="return isubmitCheck(inventory.value,action.value)">
<input type="text" name="inventory" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="棚卸">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorValue->colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeValue->sizeCode; ?>">
</form>
</td>
<td>
<?php echo $shelfmp->findByDetaleCode($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)->shelfNumber; ?>
<form method="post" action="<?php echo $this->_linkTo('shelf/putShelf'); ?>">
<input type="hidden" name="detaleCode" value="<?php echo $item->concatId . $colorValue->colorCode . $sizeValue->sizeCode; ?>">
<input type="submit" value="棚置">
</form>
</td>
</tr>
<?php
    }
}
?>
</table>

