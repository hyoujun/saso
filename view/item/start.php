<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li class=active>商品管理</li>
</ul>

<p><a href="<?php echo $this->_linkTo('item/addItem/'); ?>">商品登録</a></p>
<p><a href="<?php echo $this->_linkTo('item/archive/'); ?>">アーカイブ管理</a></p>

<form method="post" action="">
<p><input type="text" name="keyword" maxlength="50"  placeholder="商品名" required>
<input type="submit" value="検索">　
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName()); ?>">検索解除</a></p>
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
<td>プラ</td>
<td>付記</td>
<td>紙</td>
<td>付記</td>
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
<td>変更</td>
<td>追加</td>
</tr>
<?php $this->_echoItemList('foot', 1); ?>

