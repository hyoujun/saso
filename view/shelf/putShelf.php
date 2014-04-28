<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('shelf/start/'); ?>">棚番管理</a> <span class="divider">&gt;</span></li>
<li class="active">棚置</li>
</ul>

<p>棚番をバーコードから入力して下さい。下記アイテムを棚置します。</p>
<form method="post" action="<?php echo $this->_linkTo('shelf/putShelfSave/'); ?>">
<input type="hidden" name="detaleCodeReal" value="<?php echo $detaleCode; ?>">
<input type="text" name="detaleCode" pattern="^[0-9A-Za-z_-]+$" required><input type="submit" value="送信">
</form>

<table class="table table-striped">
<tr>
<td>商品詳細番号</td>
<td>商品名</td>
<td>分類</td>
<td>価格</td>
<td>色</td>
<td>サイズ</td>
<td>数量</td>
</tr>
<tr>
<td><?php echo $detaleCode; ?></td>
<td><?php echo $itemName; ?></td>
<td><?php echo $category; ?></td>
<td><?php echo $price; ?></td>
<td><?php echo $colorName . '(' . $colorCode . ')'; ?></td>
<td><?php echo $sizeName; ?></td>
<td><?php echo $quantity; ?></td>
</tr>
</table>
<?php if('' != $colormp->getImage($concatId, $colorCode)['type']){ ?>
<img src="<?php echo $this->_linkTo('image/getImage/item/' . $concatId . '/color/' . $colorCode); ?>">
<?php }else{ ?>
<p>画像はありません。</p>
<?php } ?>

