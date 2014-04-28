<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$itemmp = new models\ItemMapper();
$archivemp = new models\ArchiveMapper();
if('' == $url->getRequest('item')
     || null == $itemmp->findByConcatId($url->getRequest('item'))
     || 1 == $archivemp->findByConcatId($url->getRequest('item'))->archive ){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}
$item = $itemmp->findByConcatId($url->getRequest('item'));

$ivmp = new models\ItemVarMapper();
$categorymp = new models\CategoryMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$qlmp = new models\QuantityLogMapper();
$shelfmp = new models\ShelfMapper();

