<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li class="active">棚番管理</li>
</ul>

<?php if(null != $url->getRequest('detaleCode')){ ?>
<p><?php echo $url->getRequest('detaleCode'); ?>を<?php echo $url->getRequest('shelf'); ?>に棚置きしました。</p>
<?php } ?>

<h2>棚置商品入力</h2>
<p>棚置したい商品のバーコードを入力して下さい。</p>
<form method="post" action="<?php echo $this->_linkTo('shelf/putShelf/'); ?>">
<input type="text" name="detaleCode" pattern="^[0-9]+$" required><input type="submit" value="送信">
</form>

<h2>棚置商品選択</h2>

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

<h2>複数棚番ラベル印刷</h2>
<p>ラベルは<a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a>の<a href="<?php echo $this->_linkTo('label/addLabel/'); ?>">ラベル寸法登録</a>で予め登録して下さい。</p>
<form method="post" action="<?php echo $this->_linkTo('shelf/addMulti/'); ?>">
<p>棚列(半角英)：<input type="text" name="row" class="input-mini" maxlength="2" pattern="^[A-Za-z]+$" required>
<p>棚(半角数)：<input type="text" name="shelfMin" value="1" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>〜<input type="text" name="shelfMax" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>
<p>棚板(半角数)：<input type="text" name="trayMin" value="1" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>〜<input type="text" name="trayMax" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>
<p>棚板分割(半角数)：<input type="text" name="trayDivideMin" value="1" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>〜<input type="text" name="trayDivideMax" class="input-mini" maxlength="2" pattern="^[0-9]+$" required>
<br><input type="submit" value="ラベル作成">
</p>
</form>

<h2>単一棚番ラベル追加印刷</h2>
<p>ラベルは<a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a>の<a href="<?php echo $this->_linkTo('label/addLabel/'); ?>">ラベル寸法登録</a>で予め登録して下さい。</p>
<form method="post" action="<?php echo $this->_linkTo('shelf/addSingle/'); ?>">
<p>印刷する棚番を入力(半角英数、ハイフン)：<input type="text" name="single" pattern="^[0-9A-Za-z-]+$" required>
<br><input type="submit" value="ラベル作成">
</p>
</form>

