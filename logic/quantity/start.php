<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$detalemp = new models\DetaleMapper();
if('' != $url->getRequest('detaleCode') && null == $detalemp->findByDetaleCode($url->getRequest('detaleCode'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}

$itemmp = new models\ItemMapper();
$archivemp = new models\ArchiveMapper();
$ivmp = new models\ItemVarMapper();
$categorymp = new models\CategoryMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$detale = new models\DetaleMapper();
$qlmp = new models\QuantityLogMapper();
$shelfmp = new models\ShelfMapper();

if('' != $url->getRequest('detaleCode')){
    $concatId = $detale->findByDetaleCode($url->getRequest('detaleCode'))->concatId;
    $itemName = $itemmp->findByConcatId($concatId)->itemName;
    $categoryPath = $categorymp->getPath($ivmp->findByConcatId($concatId)->categoryId);
    $price = $ivmp->findByConcatId($concatId)->price;
    $colorCode = $detale->findByDetaleCode($url->getRequest('detaleCode'))->colorCode;
    $colorName = $colormp->getColorName($concatId, $colorCode)->colorName;
    $sizeCode = $detale->findByDetaleCode($url->getRequest('detaleCode'))->sizeCode;
    $sizeName = $sizemp->getSizeName($concatId, $sizeCode)->sizeName;
}

