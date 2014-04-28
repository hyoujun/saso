<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$itemmp = new models\ItemMapper();
$colormp = new models\ColorMapper();

if('' == $url->getRequest('item') || 
null == $itemmp->findByConcatId($url->getRequest('item')) || 
'' == $url->getRequest('color') || 
null == $colormp->getColorName($url->getRequest('item'), $url->getRequest('color'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/item/start/',TRUE,'303');
}

$item = $itemmp->findByConcatId($url->getRequest('item'));

$colorName = $colormp->getColorName($url->getRequest('item'), $url->getRequest('color'))->colorName;

