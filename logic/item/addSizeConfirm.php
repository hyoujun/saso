<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$itemmp = new models\ItemMapper();
$item = $itemmp->findByConcatId($post->getRequest('concatId'));

$sizemp = new models\SizeMapper();
$colormp = new models\ColorMapper();

$sizeNameArray = base\Validation::featuresToArray($post->getRequest('sizeName'));
foreach($sizeNameArray as $key => $value){
    unset($sizeNameArray[$key]);
    $sizeNameArray[sprintf('%02d',((int)$key)+$sizemp->getLastSizeCode($item->concatId))] = $value; 

}
