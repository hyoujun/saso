<script>
function resetConfirms(){
    if(confirm("本当に現在、選択されている商品ラベルをすべて削除しますか？")){
        location.href='<?php echo $this->_linkTo('label/resetSelection/'); ?>';
    }
}
</script>
<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li class="active">ラベル印刷</li>
</ul>

<p><a href="<?php echo $this->_linkTo('label/addLabel/'); ?>">ラベル寸法登録</a></p>
<p><a href="<?php echo $this->_linkTo('label/selectLabel/'); ?>">ラベル出力</a></p>
<?php if(1 == $url->getRequest('deleted')){ ?>
<p class="text-error">選択されている商品ラベルをすべて削除しました。</p>
<?php } ?>

<form method="post" action="">
<p><input type="text" name="keyword" maxlength="50"  placeholder="商品名" required>
<input type="submit" value="検索">　<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName()); ?>">検索解除</a></p>
</form>

<table class="table table-striped">
<tr>
<td>ラベル選択</td>
<td>数量管理
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
</tr>
<?php $this->_echoItemList('head',1); ?>

<p class="reset"><a class="btn" href="#" onClick="resetConfirms()">ラベルリセット</a></p>

