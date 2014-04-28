<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>のラベル化商品選択</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('label/itemSelected/'); ?>">
<p><input type="submit" value="登録"></p>

<table class="table table-striped">
<tr>
<td>ラベル数</td>
<td>商品詳細番号</td>
<td>商品名</td>
<td>分類</td>
<td>価格</td>
<td>色</td>
<td>サイズ</td>
<td>数量</td>
</tr>
<?php
foreach($colormp->findByConcatId($item->concatId) as $colorValue){
    foreach($sizemp->findByConcatId($item->concatId) as $sizeValue){
?>
<tr>
<td>
<?php if(null == $lcmp->findByDetaleCode($item->concatId . $colorValue->colorCode . $sizeValue->sizeCode)){ ?>
<input type="text" name="<?php echo $item->concatId . $colorValue->colorCode . $sizeValue->sizeCode; ?>" class="input-mini" pattern="^[0-9]+$" maxlength="4">
<?php } ?>
</td>
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
</tr>
<?php
    }
}
?>
</table>

<p><input type="submit" value="登録"></p>
</form>

