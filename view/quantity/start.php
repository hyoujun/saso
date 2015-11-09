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
<li class="active">数量管理</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('quantity/fluctuationBarcode/'); ?>">
<p>商品コードをバーコードリーダで入力して下さい。</p>
<input type="text" name="detaleCode" pattern="^[0-9]+$" required><input type="submit" value="送信">
</form>

<?php if('' != $url->getRequest('detaleCode')){ ?>

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
<tr>
<td>
<?php if(null != $qlmp->sumListByDetaleCode($url->getRequest('detaleCode'))->detaleCode){ ?>
<a href="<?php echo $this->_linkTo('quantity/history/detaleCode/' . $url->getRequest('detaleCode')); ?>">
<?php echo $url->getRequest('detaleCode'); ?>
</a>
<?php }else{ echo $url->getRequest('detaleCode'); } ?>
</td>
<td><?php echo $itemName; ?></td>
<td><?php echo $categoryPath; ?></td>
<td><?php echo $price; ?></td>
<td><?php echo $colorName . '(' . $colorCode . ')'; ?></td>
<td><?php echo $sizeName; ?></td>
<td class="number">
<?php if(null != $qlmp->existInventoryFlag($url->getRequest('detaleCode'))){ echo $qlmp->sumListByDetaleCode($url->getRequest('detaleCode'))->sum ;} ?>
</td>
<?php if(null != $qlmp->existInventoryFlag($url->getRequest('detaleCode'))){ ?>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/stock'); ?>" onsubmit="return submitCheck(stock.value,action.value)">
<input type="text" name="stock" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="入庫">
<input type="hidden" name="concatId" value="<?php echo $concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeCode; ?>">
<input type="hidden" name="barcode" value="1">
</form>
</td>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/shipment'); ?>" onsubmit="return submitCheck(shipment.value,action.value)">
<input type="text" name="shipment" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="出庫">
<input type="hidden" name="concatId" value="<?php echo $concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeCode; ?>">
<input type="hidden" name="barcode" value="1">
</form>
</td>
<?php }else{ ?>
<td></td><td></td>
<?php } ?>
<td>
<form method="post" action="<?php echo $this->_linkTo('quantity/inventory'); ?>" onsubmit="return isubmitCheck(inventory.value,action.value)">
<input type="text" name="inventory" class="input-mini" pattern="^[0-9]+$" maxlength="4" required><input type="submit" name="action" value="棚卸">
<input type="hidden" name="concatId" value="<?php echo $concatId; ?>">
<input type="hidden" name="colorCode" value="<?php echo $colorCode; ?>">
<input type="hidden" name="sizeCode" value="<?php echo $sizeCode; ?>">
<input type="hidden" name="barcode" value="1">
</form>
</td>
<td>
<?php echo $shelfmp->findByDetaleCode($url->getRequest('detaleCode'))->shelfNumber; ?>
<form method="post" action="<?php echo $this->_linkTo('shelf/putShelf'); ?>">
<input type="hidden" name="detaleCode" value="<?php echo $url->getRequest('detaleCode'); ?>">
<input type="submit" value="棚置">
</form>
</td>
</tr>
</table>

<?php $type = $colormp->getImage($concatId, $colorCode);if('' != $type['type']){ ?>
<img src="<?php echo $this->_linkTo('image/getImage/item/' . $concatId . '/color/' . $colorCode); ?>">
<?php }else{ ?>
</p>画像はありません。</p>
<?php } ?>

<?php } ?>

<h2>全商品リスト</h2>

<form method="post" action="">
<p><input type="text" name="keyword" maxlength="50"  placeholder="商品名" required>
<input type="submit" value="検索">　<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName()); ?>">検索解除</a></p>
</form>

<table class="table table-striped">
<tr>
<td>商品番号
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/concatId/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/concatId/direction/asc'); ?>">▲</a>
</td>
<td>商品名</td>
<td>分類
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/categoryId/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/categoryId/direction/asc'); ?>">▲</a>
</td>
<td>価格
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/price/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/price/direction/asc'); ?>">▲</a>
</td>
<td>登録日
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/createAt/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/createAt/direction/asc'); ?>">▲</a>
</td>
<td>更新日
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/updateAt/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/updateAt/direction/asc'); ?>">▲</a>
</td>
<td>色</td>
<td>サイズ</td>
</tr>
<?php $this->_echoItemList('' ,0); ?>

