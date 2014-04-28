<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$categorymp = new models\CategoryMapper();

$itemmp = new models\ItemMapper();
$ivmp = new models\ItemVarMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();

