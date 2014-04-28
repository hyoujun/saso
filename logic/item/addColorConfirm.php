<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$itemmp = new models\ItemMapper();
$item = $itemmp->findByConcatId($post->getRequest('concatId'));

$sizemp = new models\SizeMapper();
$colormp = new models\ColorMapper();

$colorNameArray = base\Validation::featuresToArray($post->getRequest('colorName'));
foreach($colorNameArray as $key => $value){
    unset($colorNameArray[$key]);
    $colorNameArray[sprintf('%02d',((int)$key)+$colormp->getLastColorCode($item->concatId))] = $value; 
}
