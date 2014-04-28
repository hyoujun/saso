<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('quantity/start/'); ?>">数量管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('quantity/fluctuation/item/' . $item->concatId); ?>"><?php echo $item->itemName; ?>の数量管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $url->getRequest('detaleCode'); ?>の入出庫履歴</li>
</ul>

<h2><?php echo $url->getRequest('detaleCode'); ?>
『<?php echo $item->itemName; ?>』
<?php echo $colormp->getColorName($item->concatId, $detalemp->findByDetaleCode($url->getRequest('detaleCode'))->colorCode)->colorName; ?>
（<?php echo $detalemp->findByDetaleCode($url->getRequest('detaleCode'))->colorCode; ?>）、
<?php echo $sizemp->getSizeName($item->concatId, $detalemp->findByDetaleCode($url->getRequest('detaleCode'))->sizeCode)->sizeName; ?>
の入出庫履歴</h2>
<div class="span6">
<table class="table table-striped">
<tr>
<td>日時</td>
<td>入出庫数</td>
<td>摘要</td>
</tr>
<?php
foreach($qlmp->findAllHistory($url->getRequest('detaleCode')) as $value){
?>
<tr>
<td>
<?php echo $value->changeAt->format('Y年m月d日 H時i分'); ?>
</td>
<td class="number">
<?php echo $value->fluctuation; ?>
</td>
<td>
<?php
if(1 == $value->inventoryFlag){
echo '棚卸';
}elseif(0 > $value->fluctuation){
echo '出庫';
}else{
echo '入庫';
}
?>
</td>
</tr>
<?php } ?>
<tr>
<th>合計</th>
<th class="number">
<?php echo $qlmp->sumListByDetaleCode($url->getRequest('detaleCode'))->sum; ?>
</th>
</tr>
</table>
</div>

