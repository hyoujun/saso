<?php
foreach($allItem as $counter => $item){
    if($counter <= ($page - 1)*OUTPUT_ROW-1 ){continue;}
    if($counter >= $page*OUTPUT_ROW){break;}
?>
<tr>
<?php
if(isset($headOption)){
    require $headOption;
}
?>
<td><a href="<?php echo $this->_linkTo('quantity/fluctuation/item/' . $item->concatId); ?>"><?php echo $item->concatId; ?></a></td>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $categorymp->getPath($ivmp->findByConcatId($item->concatId)->categoryId); ?></td>
<td><?php echo $ivmp->findByConcatId($item->concatId)->price; ?></td>
<?php if(1 == $packageFlag){ ?>
<td>
<?php if(1 == $item->pla){ ?>
<img src="<?php echo $this->_linkTo('img/pla.gif'); ?>" alt="プラ" width="25" height="25">
<?php } ?>
</td>
<td><?php echo $item->plaNote; ?></td>
<td>
<?php if(1 == $item->paper){ ?>
<img src="<?php echo $this->_linkTo('img/kami.gif'); ?>" alt="紙" width="25" height="25">
<?php } ?>
</td>
<td><?php echo $item->paperNote; ?></td>
<?php } ?>
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
<?php
if(isset($footOption)){
    require $footOption;
}
?>
<?php
}
?>
</table>

<div class="pagination pagination-centered">
<ul>
<?php for($i = 1; $i <= $pageAmount; $i++){ ?>
<li<?php if($i == $url->getRequest('page') || (null == $url->getRequest('page') && $i == 1)){ echo ' class="active"';} ?>>
<a href="<?php echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName() .'/'. $param . 'page/'.$i); ?>">
<?php echo $i; ?>
</a>
</li>
<?php } ?>
</ul>
</div>

