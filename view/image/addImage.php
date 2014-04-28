<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>の画像登録</li>
</ul>

<?php require_once 'logic/item/nowItem.php'; require_once 'view/item/nowItem.php'; ?>
<p><?php echo $item->concatId; ?>『<?php echo $item->itemName; ?>』に画像を登録します。各色にアップロードして下さい。</p>

<?php foreach($colormp->findByConcatId($item->concatId) as $value){ ?>

<p><?php echo $value->colorName . '(' . $value->colorCode . ')'; ?>：</p>

<?php if(null != $colormp->getImage($item->concatId, $value->colorCode)['type']){ ?>
<img src="<?php echo $this->_linkTo('image/getImage/item/' . $item->concatId . '/color/' . $value->colorCode); ?>" alt="<?php echo $item->itemName . 'の' .$colormp->getColorName($item->concatId, $value->colorCode)->colorName . '(' . $value->colorCode . ')'; ?>">
<?php } ?>

<form method="post" action="<?php echo $this->_linkTo('image/addImageSave/'); ?>" enctype="multipart/form-data">
<input type="file" name="image">
<input type="hidden" name="colorCode" value="<?php echo $value->colorCode; ?>">
<input type="hidden" name="concatId" value="<?php echo $item->concatId; ?>">
<input type="submit" value="アップロード">
</form>

<?php } ?>

