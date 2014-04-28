<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$dt = new \DateTime();
$dateCode = $dt->format('ym');
$itemmp = new models\ItemMapper();
$serial = 1 + $itemmp->getLastSerial($dateCode);
$serial = sprintf('%04d',$serial);

$itemName = mb_substr($post->getRequest('itemName'),0,50,'utf-8');

$categorymp = new models\CategoryMapper();

$colorArray = base\Validation::featuresToArray($post->getRequest('colorName'));
$sizeArray = base\Validation::featuresToArray($post->getRequest('sizeName'));

$plaNote = mb_substr($post->getRequest('plaNote'),0,50,'utf-8');
$paperNote = mb_substr($post->getRequest('paperNote'),0,50,'utf-8');

