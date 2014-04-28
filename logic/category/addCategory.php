<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$categorymp = new models\CategoryMapper();

$nameTree = '';
$addedParentId = '';
$path = '';
for($i = 0; $url->getRequest('gen'.$i); $i++){
    $nameTree .= '/' . $categorymp->findBycategoryId($url->getRequest('gen'.$i))->categoryName;
    $addedParentId = $categorymp->findBycategoryId($url->getRequest('gen'.$i))->categoryId;
    $path .= $categorymp->findBycategoryId($url->getRequest('gen'.$i))->categoryId . ',';
}

