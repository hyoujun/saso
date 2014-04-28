<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$colormp = new models\ColorMapper();

$colorNameArray = base\Validation::featuresToArray($post->getRequest('colorName'));
foreach($colorNameArray as $key => $value){
    unset($colorNameArray[$key]);
    $colorNameArray[sprintf('%02d',((int)$key)+$colormp->getLastColorCode($post->getRequest('concatId')))] = $value; 
}

$color = new models\Color();
foreach($colorNameArray as $key => $value){
    $color->concatId = $post->getRequest('concatId');
    $color->colorCode = $key;
    $color->colorName = $value;
    $colormp->insert($color);
}

$sizemp = new models\SizeMapper();
$detalemp = new models\DetaleMapper();
$detale = new models\Detale();
$shelfmp = new models\ShelfMapper();
$shelf = new models\Shelf();
foreach($colorNameArray as $key => $value){
    foreach($sizemp->findByConcatId($post->getRequest('concatId')) as $size){
        $detale->concatId = $post->getRequest('concatId');
        $detale->colorCode = $key;
        $detale->sizeCode = $size->sizeCode;
        $detalemp->insert($detale);
        $shelf->detaleCode = $post->getRequest('concatId') . $key . $size->sizeCode;
        $shelfmp->insert($shelf);
    }
}

$ivmp = new models\ItemVarMapper();
$iv = new models\ItemVar();
$iv->concatId = $post->getRequest('concatId');
$iv->updateAt = new \DateTime();
$ivmp->update($iv);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

