<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('category/start/'); ?>">分類管理</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('category/addCategory/'); ?>">
<?php
if(null == $pathArray){
    echo '親';
}else{
    foreach($pathArray as $value){
        echo '/' . $categorymp->findBycategoryId($value)->categoryName;
    }
    echo 'の';
}
?>
分類登録</a> <span class="divider">&gt;</span></li>
<li class=active>登録確認</a></li>
</ul>

<h2><?php
if(null == $pathArray){
    echo '親';
}else{
    foreach($pathArray as $value){
        echo '/' . $categorymp->findBycategoryId($value)->categoryName;
    }
    echo 'の';
}
?>
登録確認</h2>

<form method="post" action="<?php echo $this->_linkTo('category/addCategorySave/'); ?>">
<input type="hidden" name="addedParentId" value="<?php echo $addedParentId; ?>">
<input type="hidden" name="categoryName" value="<?php echo $post->getRequest('categoryName'); ?>">
<input type="submit" value="登録">
</form>
<ul>
<?php foreach($addCategory as $value){ ?>
<li><?php echo $value; ?></li>
<?php } ?>
</ul>

<h2>登録修正</h2>
<form method="post" action="">
<p>カテゴリー：<input type="text" name="categoryName" value="<?php echo $post->getRequest('categoryName'); ?>" required>※複数入力する場合は半角カンマ（,）で区切って下さい。</p>
<input type="hidden" name="addedParentId" value="<?php echo $addedParentId; ?>">
<input type="hidden" name="path" value="<?php echo $path; ?>">
<p><input type="submit" value="登録確認"></p>
</form/>
