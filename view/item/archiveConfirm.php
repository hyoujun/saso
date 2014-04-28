<script>
function submitCheck(){
    var flag = confirm("アーカイブすると戻せません。\n本当にアーカイブしますか？");
    return flag;
}
</script>
<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('item/archive/'); ?>">アーカイブ管理</a> <span class="divider">&gt;</span></li>
<li class="active">アーカイブ確認</li>
</ul>

<form method="post" action="<?php echo $this->_linkTo('item/archiveSave/'); ?>" onsubmit="return submitCheck()">
<p><input type="submit" value="アーカイブ確定"></p>
<table class="table table-striped">
<tr>
<td>商品番号</td>
<td>商品名</td>
<td>分類</td>
<td>価格</td>
<td>登録日</td>
<td>更新日</td>
<td>色</td>
<td>サイズ</td>
<td>アーカイブ理由</td>
</tr>
<?php foreach($archivingItem as $concatId => $archiveNote){ ?>
<tr>
<td><?php echo $concatId; ?></td>
<td><?php echo $itemmp->findByConcatId($concatId)->itemName; ?></td>
<td><?php echo $categorymp->getPath($ivmp->findByConcatId($concatId)->categoryId); ?></td>
<td><?php echo $ivmp->findByConcatId($concatId)->price; ?></td>
<td><?php echo $itemmp->findByConcatId($concatId)->createAt->format('Y年m月d日'); ?></td>
<td><?php echo $ivmp->findByConcatId($concatId)->updateAt->format('Y年m月d日'); ?></td>
<td>
<?php
foreach($colormp->findByConcatId($concatId) as $key => $color){
    echo '<a href="' . $this->_linkTo('image/displayImage/item/' . $concatId . '/color/' . $color->colorCode) . '">';
    echo $color->colorName . '(' . $color->colorCode . ')';
    echo '</a>';
    if($colormp->findByConcatId($concatId)->rowCount()-1 != $key){
        echo "、";
    }
}
?>
</td>
<td>
<?php
foreach($sizemp->findByConcatId($concatId) as $key => $size){
    echo $size->sizeName;
    if($sizemp->findByConcatId($concatId)->rowCount()-1 != $key){
        echo "、";
    }
}
?>
</td>
<td><input type="text" name="<?php echo $concatId; ?>" value="<?php echo $post->getRequest('archiveNote' . $concatId); ?>" size="20" maxlength="50" required></td>
</tr>
<?php } ?>
</table>
</form>

