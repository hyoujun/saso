<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$archivingItem = array();
$itemmp = new models\ItemMapper();
foreach($itemmp->findAllForList() as $item){
    if('1' == $post->getRequest($item->concatId)){
        $archiveNote = mb_substr($post->getRequest('archiveNote' . $item->concatId),0,50,'utf-8');
        $archivingItem[$item->concatId] = $archiveNote;
    }
}
$ivmp = new models\ItemVarMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$categorymp = new models\CategoryMapper();

