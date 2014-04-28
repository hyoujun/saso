<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$itemmp = new models\ItemMapper();
if('' == $url->getRequest('item') || null == $itemmp->findByConcatId($url->getRequest('item'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}

$item = $itemmp->findByConcatId($url->getRequest('item'));

$ivmp = new models\ItemVarMapper();
$categorymp = new models\CategoryMapper();

