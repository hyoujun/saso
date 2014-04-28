<ul class="breadcrumb">
<li><a href="<?php echo $this->_linkTo(''); ?>">スタートメニュー</a> <span class="divider">&gt;</span></li>
<li><a href="<?php echo $this->_linkTo('category/start'); ?>">分類管理</a> <span class="divider">&gt;</span></li>
<li class=active>分類変更・削除</li>
</ul>

<h2>先祖分類</h2>
<p><?php echo $categorymp->getPath($post->getRequest('categoryId')) ?></p>

<h2>直属の子分類</h2>
<ul>
<?php foreach($categorymp->findChildren($post->getRequest('categoryId')) as $value){ ?>
<li><?php echo $value->categoryName; ?></li>
<?php } ?>
</ul>

<h2>分類名称変更</h2>
<form method="post" action="<?php echo $this->_linkTo('category/changeName'); ?>">
<p><input type="text" name="categoryName" value="<?php echo $categorymp->findByCategoryId($post->getRequest('categoryId'))->categoryName; ?>" required></p>
<input type="hidden" name="categoryId" value="<?php echo $post->getRequest('categoryId'); ?>">
<p><input type="submit" value="変更"></p>
</form>

<h2>分類削除</h2>
<form method="post" action="<?php echo $this->_linkTo('category/deleteCategory'); ?>">
<p><input type="radio" name="method" value="childrenPromote" required>単一（子孫分類を一段階昇格）</p>
<p><input type="radio" name="method" value="withChildren" required>連座（子孫分類ごと全て削除）</p>
<input type="hidden" name="categoryId" value="<?php echo $post->getRequest('categoryId'); ?>">
<p><input type="submit" value="削除"></p>
</form>

