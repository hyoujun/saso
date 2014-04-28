<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li class="active">アーカイブ管理</li>
</ul>

<form method="post" action="">
<p><input type="text" name="keyword" maxlength="50"  placeholder="商品名" required>
<input type="submit" value="検索">　
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName()); ?>">検索解除</a></p>
</form>

<form method="post" action="<?php echo $this->_linkTo('item/archiveConfirm/'); ?>">
<input type="submit" value="アーカイブ確認">
<table class="table table-striped">
<tr>
<td>アーカイブ？</td>
<td>アーカイブ理由</td>
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
<?php $this->_echoItemList('head' ,0); ?>
</form>



<h2>アーカイブ</h2>
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
<td>アーカイブ理由</td>
<td>アーカイブ日
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/archiveAt/direction/desc'); ?>">▼</a>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/sortby/archiveAt/direction/asc'); ?>">▲</a>
</td>
</tr>
<?php require_once 'logic/item/archiveList.php'; require_once 'view/item/archiveList.php'; ?>


