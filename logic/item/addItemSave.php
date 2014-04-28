<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

//Itemテーブル
$itemmp = new models\ItemMapper();
$item = new models\Item();
$dt = new \DateTime();
$item->dateCode = $dt->format('ym');
$item->serial = 1 + $itemmp->getLastSerial($item->dateCode);
$item->itemName = $post->getRequest('itemName');
$item->pla = base\Validation::checkValidation($post->getRequest('pla'), '0-9');
$item->plaNote =$post->getRequest('plaNote');
$item->paper = base\Validation::checkValidation($post->getRequest('paper'), '0-9');
$item->paperNote = $post->getRequest('paperNote');
$item->createAt = new \DateTime();
$itemmp->insert($item);

//ItemVar,Archive,Color,Size,Detale,Shelfテーブル
$concatId = $item->dateCode . sprintf('%04d',$item->serial);

//ItemVar
$ivmp = new models\ItemVarMapper();
$iv = new models\ItemVar();
$iv->concatId = $concatId;
$iv->categoryId = base\Validation::checkValidation($post->getRequest('categoryId'), '0-9');
$iv->price = base\Validation::checkValidation($post->getRequest('price'), '0-9');
$iv->updateAt = new \DateTime();
$ivmp->insert($iv);

//Archive
$archivemp = new models\ArchiveMapper();
$archive = new models\Archive();
$archive->concatId = $concatId;
$archivemp->insert($archive);

//Color
$colormp = new models\ColorMapper();
$color = new models\Color();
$colorArray = base\Validation::featuresToArray($post->getRequest('colorName'));
foreach($colorArray as $key => $value){
    $color->concatId = $concatId;
    $color->colorCode = $key;
    $color->colorName = $value;
    $colormp->insert($color);
}
//Size
$sizemp = new models\SizeMapper();
$size = new models\Size();
$sizeArray = base\Validation::featuresToArray($post->getRequest('sizeName'));
foreach($sizeArray as $key => $value){
    $size->concatId = $concatId;
    $size->sizeCode = $key;
    $size->sizeName = $value;
    $sizemp->insert($size);
}
//Detale,Shelf
$detalemp = new models\DetaleMapper();
$detale = new models\Detale();
$shelfmp = new models\ShelfMapper();
$shelf = new models\Shelf();
foreach($colorArray as $colorCode => $colorName){
    foreach($sizeArray as $sizeCode => $sizeName){
        $detaleCode = $concatId . $colorCode . $sizeCode;
        
        $detale->concatId = $concatId;
        $detale->colorCode = $colorCode;
        $detale->sizeCode = $sizeCode;
        $detale->detaleCode = $detaleCode;
        $detalemp->insert($detale);
        
        $shelf->detaleCode = $detaleCode;
        $shelfmp->insert($shelf);
    }
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

