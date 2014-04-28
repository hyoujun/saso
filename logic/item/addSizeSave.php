<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$sizemp = new models\SizeMapper();

$sizeNameArray =base\Validation::featuresToArray($post->getRequest('sizeName'));
foreach($sizeNameArray as $key => $value){
    unset($sizeNameArray[$key]);
    $sizeNameArray[sprintf('%02d',((int)$key)+$sizemp->getLastSizeCode($post->getRequest('concatId')))] = $value; 
}

$size = new models\Size();
foreach($sizeNameArray as $key => $value){
    $size->concatId = $post->getRequest('concatId');
    $size->sizeCode = $key;
    $size->sizeName = $value;
    $sizemp->insert($size);
}

$colormp = new models\ColorMapper();
$detalemp = new models\DetaleMapper();
$detale = new models\Detale();
$shelfmp = new models\ShelfMapper();
$shelf = new models\Shelf();
foreach($sizeNameArray as $key => $value){
    foreach($colormp->findByConcatId($post->getRequest('concatId')) as $color){
        $detale->concatId = $post->getRequest('concatId');
        $detale->sizeCode = $key;
        $detale->colorCode = $color->colorCode;
        $detalemp->insert($detale);
        $shelf->detaleCode = $post->getRequest('concatId') . $color->colorCode . $key;
        $shelfmp->insert($shelf);
    }
}

$ivmp = new models\ItemVarMapper();
$iv = new models\ItemVar();
$iv->concatId = $post->getRequest('concatId');
$iv->updateAt = new \DateTime();
$ivmp->update($iv);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

