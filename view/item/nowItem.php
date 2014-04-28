<table class="table">
<tr>
<td>商品番号</td>
<td>商品名</td>
<td>分類</td>
<td>価格</td>
<td>プラ</td>
<td>付記</td>
<td>紙</td>
<td>付記</td>
<td>登録日</td>
<td>更新日</td>
<td>色</td>
<td>サイズ</td>
</tr>
<tr>
<td><?php echo $item->concatId; ?></td>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $categorymp->getPath($ivmp->findByConcatId($item->concatId)->categoryId); ?></td>
<td><?php echo $ivmp->findByConcatId($item->concatId)->price; ?></td>
<td><?php if(1 == $item->pla){ ?>
<img src="<?php echo $this->_linkTo('img/pla.gif'); ?>" alt="プラ" width="25" height="25">
<?php } ?>
</td>
<td><?php echo $item->plaNote; ?></td>
<td><?php if(1 == $item->paper){ ?>
<img src="<?php echo $this->_linkTo('img/kami.gif'); ?>" alt="プラ" width="25" height="25">
<?php } ?>
</td>
<td><?php echo $item->paperNote; ?></td>
<td><?php echo $item->createAt->format('Y年m月d日'); ?></td>
<td><?php echo $ivmp->findByConcatId($item->concatId)->updateAt->format('Y年m月d日'); ?></td>
<td>
<?php
foreach($colormp->findByConcatId($item->concatId) as $key => $color){
    echo '<a href="' . $this->_linkTo('image/displayImage/item/' . $item->concatId . '/color/' . $color->colorCode) . '">';
    echo $color->colorName . '(' . $color->colorCode . ')';
    echo '</a>';
    if($colormp->findByConcatId($item->concatId)->rowCount()-1 != $key){
        echo "、";
    }
}
?>
</td>
<td>
<?php
foreach($sizemp->findByConcatId($item->concatId) as $key => $size){
    echo $size->sizeName;
    if($sizemp->findByConcatId($item->concatId)->rowCount()-1 != $key){
        echo "、";
    }
}
?>
</td>
</tr>
</table>

