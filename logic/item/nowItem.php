<?php
use \saso\classes\models;

$itemmp = new models\ItemMapper();
$ivmp = new models\ItemVarMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$categorymp = new models\CategoryMapper();

if(isset($url)){
    $item = $itemmp->findByConcatId($url->getRequest('item'));
}elseif(isset($post)){
    $item = $itemmp->findByConcatId($post->getRequest('concatId'));
}

