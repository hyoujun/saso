<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="utf-8">
<link href="<?php echo $this->_linkto('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo $this->_linkto('bootstrap/css/bootstrap_custom.css'); ?>" rel="stylesheet">
<style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
</style>
<title>在庫管理システム「SASO<?php echo VERSION; ?>」 - <?php echo $this->_getContentTitle(); ?></title>
</head>
<body onload="document.forms[0].detaleCode.focus();">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo $this->_linkTo('start/start/'); ?>">在庫管理システム『SASO<?php echo VERSION; ?>』</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="<?php if($this->_getControllerName() == 'start'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('start/start/'); ?>">スタートメニュー</a></li>
              <li class="<?php if($this->_getControllerName() == 'item'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('item/start/'); ?>">商品管理</a></li>
              <li class="<?php if($this->_getControllerName() == 'category'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('category/start/'); ?>">分類管理</a></li>
              <li class="<?php if($this->_getControllerName() == 'quantity'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('quantity/start/'); ?>">数量管理</a></li>
              <li class="<?php if($this->_getControllerName() == 'shelf'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('shelf/start/'); ?>">棚番管理</a></li>
              <li class="<?php if($this->_getControllerName() == 'label'){echo 'active';} ?>"><a href="<?php echo $this->_linkTo('label/start/'); ?>">ラベル印刷</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<div class="container-fluid">
<div class="row-fluid">

<?php if(file_exists('installer/installer.php')){ ?>
<p class="span12 text-error">まだインストールが済んでいないなら、「<a href="installer/installer.php">installer/installer.php</a>」にアクセスして下さい。
<br>すでにインストール済みなら、フォルダ「installer」を削除して下さい。</p>
<?php } ?>

<h1 class="span7"><?php echo $this->_getContentTitle(); ?></h1>

<div class="span4">
<p class="text-success"><?php echo $_SESSION['userName'] . '様ログイン中。' ?>
　<a class="btn btn-mini" href="<?php echo $this->_linkTo('start/logout/'); ?>">ログアウト</a></p>
</div>

<div class="span12">
<?php require_once $this->_getContent(); ?>
</div>

</div>
</div> <!-- /container -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?php echo $this->_linkto('bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>

