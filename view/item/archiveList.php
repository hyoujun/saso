<?php
foreach($allItem as $counter => $item){
    if($counter <= ($page - 1)*OUTPUT_ROW-1 ){continue;}
    if($counter >= $page*OUTPUT_ROW){break;}
?>
<tr>
<td><?php echo $item->concatId; ?></td>
<td><?php echo $item->itemName; ?></td>
<td><?php echo $categorymp->getPath($ivmp->findByConcatId($item->concatId)->categoryId); ?></td>
<td><?php echo $ivmp->findByConcatId($item->concatId)->price; ?></td>
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
<td>
<?php echo $archivemp->findByConcatId($item->concatId)->archiveNote; ?>
</td>
<td>
<?php echo $archivemp->findByConcatId($item->concatId)->archiveAt->format('Y年m月d日'); ?>
</td>

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

