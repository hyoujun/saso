<ul>
    <?php foreach($categorymp->findAllParent() as $child0){ ?>
    <li>
        <input type="radio" name="categoryId" value="<?php echo $child0->categoryId; ?>">
        <a href="<?php
        if(isset($item)){
            echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName().'/gen0/' . $child0->categoryId) . '/item/' . $item->concatId;
        }else{
            echo $this->_linkTo($this->_getControllerName() .'/'. $this->_getActionName().'/gen0/' . $child0->categoryId);
        } 
        ?>"><?php echo $child0->categoryName; ?></a>
        <?php $i =0; require 'view/category/childrenList.php'; ?>
    </li>
    <?php } ?>
    <li>
        <a class="btn btn-mini" href="<?php echo $this->_linkTo('category/addCategory/'); ?>">分類登録</a>
    </li>
</ul>

