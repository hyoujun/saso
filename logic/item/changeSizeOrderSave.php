<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

foreach($post->getRequest() as $key => $value){
    if('concatId' == $key){
        continue;
    }
    $sizemp = new models\SizeMapper();
    $size = new models\Size();
    $size->concatId = base\Validation::checkValidation($post->getRequest('concatId'), '0-9');
    $size->sizeCode = base\Validation::checkValidation($key, '0-9');
    $size->sizeName = 'dummy';
    $size->orderNumber = base\Validation::checkValidation($value, '0-9');
    $sizemp->updateOrderNumber($size);
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

