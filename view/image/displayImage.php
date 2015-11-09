<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li class="active"><?php echo $item->itemName; ?>の画像表示</li>
</ul>

<p><?php echo $item->concatId; ?>『<?php echo $item->itemName; ?>』
<?php echo $colorName . '(' . $url->getRequest('color') . ')'; ?>
</p>
<?php $type = $colormp->getImage($url->getRequest('item'), $url->getRequest('color'));if(null != $type['type']){ ?>
<img src="<?php echo $this->_linkTo('image/getImage/item/' . $url->getRequest('item') . '/color/' . $url->getRequest('color')); ?>" alt="<?php echo $item->itemName . 'の' .$colorName . '(' . $url->getRequest('color') . ')'; ?>">
<?php }else{ ?>
<p>画像はありません。</p>
<p><a href="<?php echo $this->_linkTo('image/addImage/item/' . $item->concatId); ?>" class="btn">画像登録</a></p>
<?php } ?>

