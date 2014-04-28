<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/addItem/'); ?>">商品登録</a> <span class="divider">&gt;</span></li>
<li class="active">商品登録確認</li>
</ul>

<p>商品番号：<?php echo $dateCode . $serial; ?></p>
<p>商品名：<?php echo $itemName; ?></p>
<p>分類：<?php echo $categorymp->getPath($post->getRequest('categoryId')); ?></p>
<p>価格：<?php echo $post->getRequest('price');?></p>
<dl>
<dt>色：</dt>
<?php
foreach($colorArray as $key => $value){
    echo '<dd>' . $value . '(' . $key . ')</dd>';
}
?>
</dl>
<dl>
<dt>サイズ：</dt>
<?php
foreach($sizeArray as $value){
    echo '<dd>' . $value . '</dd>';
}
?>
</dl>

<?php if('1' == $post->getRequest('pla')){ ?>
<img src="<?php echo $this->_linkTo('img/pla.gif')?>" alt="プラ" width="25" height="25">
<p><?php echo $plaNote; ?></p>
<?php } ?>
<?php if('1' == $post->getRequest('paper')){ ?>
<img src="<?php echo $this->_linkTo('img/kami.gif')?>" alt="紙" width="25" height="25">
<p><?php echo $paperNote; ?></p>
<?php } ?>

<form method="post" action="<?php echo $this->_linkTo('item/addItemSave/'); ?>">
<input type="hidden" name="itemName" value="<?php echo $itemName; ?>">
<input type="hidden" name="categoryId" value="<?php echo $post->getRequest('categoryId'); ?>">
<input type="hidden" name="price" value="<?php echo $post->getRequest('price'); ?>">
<input type="hidden" name="colorName" value="<?php echo $post->getRequest('colorName'); ?>">
<input type="hidden" name="sizeName" value="<?php echo $post->getRequest('sizeName'); ?>">
<input type="hidden" name="pla" value="<?php echo $post->getRequest('pla'); ?>">
<?php if('1' == $post->getRequest('pla')){ ?>
<input type="hidden" name="plaNote" value="<?php echo $plaNote; ?>">
<?php } ?>
<input type="hidden" name="paper" value="<?php echo $post->getRequest('paper'); ?>">
<?php if('1' == $post->getRequest('paper')){ ?>
<input type="hidden" name="paperNote" value="<?php echo $paperNote; ?>">
<?php } ?>
<p><input type="submit" value="確認して登録完了"></p>
</form>

<h2>変更</h2>

<form method="post" action="">
<p>分類：<?php echo $categorymp->getPath($post->getRequest('categoryId')); ?></p>
<input type="hidden" name="categoryId" value="<?php echo $post->getRequest('categoryId'); ?>">
<p>商品名(50字以内)：<input type="text" name="itemName" size="50" maxlength="50" required value="<?php echo $itemName; ?>"></p>
<p>価格：<input type="text" name="price" pattern="^[0-9]+$" maxlength="10" value="<?php echo $post->getRequest('price'); ?>"><p>
<p>色：<input type="text" name="colorName" required value="<?php echo $post->getRequest('colorName'); ?>">※複数入力する場合は半角カンマで区切って下さい。</p>
<p>サイズ：<input type="text" name="sizeName" required value="<?php echo $post->getRequest('sizeName'); ?>">※複数入力する場合は半角カンマで区切って下さい。</p>
<p>梱包</p>
<p><input type="checkbox" name="pla" value="1" <?php if('1' == $post->getRequest('pla')){echo 'checked';} ?>>プラ<input type="text" name="plaNote" maxlength="50" value="<?php echo $plaNote; ?>"></p>
<p><input type="checkbox" name="paper" value="1" <?php if('1' == $post->getRequest('paper')){echo 'checked';} ?>>紙<input type="text" name="paperNote" maxlength="50" value="<?php echo $paperNote; ?>"></p>
<p><input type="submit" value="登録確認"></p>
</form>

