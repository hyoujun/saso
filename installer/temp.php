<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="utf-8">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap_custom.css" rel="stylesheet">
<style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
</style>
<title>在庫管理システム「SASO<?php echo VERSION; ?>」 - インストールメニュー</title>
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
          <a class="brand" href="../">在庫管理システム『SASO<?php echo VERSION; ?>』</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active>"><a href="./installer.php">インストールメニュー</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<div class="container-fluid">
<div class="row-fluid">
<div class="span12">

<h1>インストールメニュー</h1>

<?php require_once $view; ?>
</div>
</div>
</div> <!-- /container -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

