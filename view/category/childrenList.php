<?php if(${'child'.$i}->categoryId == $url->getRequest('gen'.$i) && null != $categorymp->findChildren($url->getRequest('gen'.$i))->fetch()->categoryId){ ?>
<ul>
    <?php foreach($categorymp->findChildren($url->getRequest('gen'.$i)) as ${'child'.($i+1)}){ ?>
    <?php
    $address = '';
    for($j = 0; $j <= $i; $j++){
        $address .= 'gen'. $j .'/'. $url->getRequest('gen'.$j).'/';
    }
    ?>

    <li>
        <input type="radio" name="categoryId" value="<?php echo ${'child'.($i+1)}->categoryId; ?>">
        <a href="<?php 
        if(isset($item)){
            echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName().'/'.$address.'gen'.($i+1).'/'.${'child'.($i+1)}->categoryId . '/item/' . $item->concatId); 
        }else{
            echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName().'/'.$address.'gen'.($i+1).'/'.${'child'.($i+1)}->categoryId); 
        }
        ?>"><?php echo ${'child'.($i+1)}->categoryName; ?></a>
        <?php $i++; require 'view/category/childrenList.php'; $i--; ?>
    </li>
    <?php } ?>
    <li>
        <a class="btn btn-mini" href="<?php echo $this->_linkTo('category/addCategory/'.$address); ?>">分類登録</a>
    </li>
</ul>
<?php }elseif(${'child'.$i}->categoryId == $url->getRequest('gen'.$i) && null == $categorymp->findChildren($url->getRequest('gen'.$i))->fetch()->categoryId){ ?>
<?php
$address = '';
for($j = 0; $j <= $i; $j++){
    $address .= 'gen' . $j .'/'. $url->getRequest('gen'.$j) . '/';
}
?>
<ul>
    <li>
        <a class="btn btn-mini" href="<?php echo $this->_linkTo('category/addCategory/'.$address); ?>">分類登録</a>
    </li>
</ul>
<?php } ?>

