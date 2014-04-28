<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('category/start/'); ?>">分類管理</a> <span class="divider">&gt;</span></li>
<li class=active><?php
if(null == $url->getRequest('gen0')){
    echo '親';
}else{
    echo $nameTree . 'の';
}
?>分類登録</li>
</ul>

<h2><?php
if(null == $url->getRequest('gen0')){
    echo '親';
}else{
    echo $nameTree . 'の';
}
?>分類登録</h2>

<form method="post" action="<?php echo $this->_linkTo('category/addCategoryConfirm/'); ?>">
<p>カテゴリー：<input type="text" name="categoryName" required>※複数入力する場合は半角カンマ（,）で区切って下さい。</p>
<input type="hidden" name="addedParentId" value="<?php echo $addedParentId; ?>">
<input type="hidden" name="path" value="<?php echo $path; ?>">
<p><input type="submit" value="登録確認"></p>
</form/>
