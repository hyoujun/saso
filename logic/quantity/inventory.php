<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$inventory = base\Validation::checkValidation($post->getRequest('inventory'),'0-9');
$qlmp = new models\QuantityLogMapper;
if(null != $inventory){
    $qlmp->delete($post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode'));
}
$ql = new models\QuantityLog();
$ql->detaleCode = $post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode');
$ql->fluctuation = $inventory;
$ql->inventoryFlag = 1;
$ql->changeAt = new \DateTime();
$qlmp->insert($ql);

if(1 == $post->getRequest('barcode')){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/detaleCode/' . $post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode'),TRUE,'303');
}else{
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/fluctuation/item/' . $post->getRequest('concatId'),TRUE,'303');
}

