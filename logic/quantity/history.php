<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$detalemp = new models\DetaleMapper();
if('' == $url->getRequest('detaleCode') 
    || null == $detalemp->findByDetaleCode($url->getRequest('detaleCode')) 
){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}

$itemmp = new models\ItemMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$qlmp = new models\QuantityLogMapper();

$item = $itemmp->findByConcatId($detalemp->findByDetaleCode($url->getRequest('detaleCode'))->concatId);

