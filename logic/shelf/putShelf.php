<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$detalemp = new models\DetaleMapper();
$itemmp = new models\ItemMapper();
$ivmp = new models\ItemVarMapper();
$categorymp = new models\CategoryMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$qlmp = new models\QuantityLogMapper();

if(!isset($detalemp->findByDetaleCode($post->getRequest('detaleCode'))->detaleCode)){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}

$detaleCode = $detalemp->findByDetaleCode($post->getRequest('detaleCode'))->detaleCode;
$concatId = $detalemp->findByDetaleCode($detaleCode)->concatId;
$category = $categorymp->getPath($ivmp->findByConcatId($concatId)->categoryId);
$price = $ivmp->findByConcatId($concatId)->price;
$colorCode = $detalemp->findByDetaleCode($detaleCode)->colorCode;
$colorName = $colormp->getColorName($concatId, $colorCode)->colorName;
$sizeCode = $detalemp->findByDetaleCode($detaleCode)->sizeCode;
$sizeName = $sizemp->getSizeName($concatId, $sizeCode)->sizeName;
$itemName = $itemmp->findByConcatId($concatId)->itemName;
$quantity = $qlmp->sumListByDetaleCode($detaleCode)->sum;

