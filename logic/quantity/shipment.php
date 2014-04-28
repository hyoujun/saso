<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$shipment = base\Validation::checkValidation($post->getRequest('shipment'), '0-9');
if(0 == $shipment){
    throw new \Exception('invalid');
}
$qlmp = new models\QuantityLogMapper;
if($shipment <= $qlmp->sumListByDetaleCode($post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode'))->sum){
    $ql = new models\QuantityLog();
    $ql->detaleCode = $post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode');
    $ql->fluctuation = -($shipment);
    $ql->inventoryFlag = 0;
    $ql->changeAt = new \DateTime();
    $qlmp->insert($ql);
    
    if(1 == $post->getRequest('barcode')){
        header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/detaleCode/' . $post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode'),TRUE,'303');
    }else{
        header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/fluctuation/item/' . $post->getRequest('concatId'),TRUE,'303');
    }

}else{
    if(1 == $post->getRequest('barcode')){
        header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/detaleCode/' . $post->getRequest('concatId') . $post->getRequest('colorCode') . $post->getRequest('sizeCode') . '/error/1',TRUE,'303');
    }else{
        header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/fluctuation/item/' . $post->getRequest('concatId') . '/error/1',TRUE,'303');
    }
}

