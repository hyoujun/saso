<?php
use \saso\classes\models;
use \saso\classes\base;

$url = new base\Request(new base\UrlParameter());

$itemmp = new models\ItemMapper();
$ivmp = new models\ItemVarMapper();
$archivemp = new models\ArchiveMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$categorymp = new models\CategoryMapper();

switch($url->getRequest('sortby')){
    case 'concatId':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('concatId','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('concatId','ASC');
        }
        break;
    case 'categoryId':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('categoryId','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('categoryId','ASC');
        }
        break;
    case 'price':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('price','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('price','ASC');
        }
        break;
    case 'createAt':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('createAt','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('createAt','ASC');
        }
        break;
    case 'updateAt':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('updateAt','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('updateAt','ASC');
        }
        break;
    case 'archiveAt':
        if('desc' == $url->getRequest('direction')){
            $allItem = $itemmp->findArchivedForList('archiveAt','DESC');
        }else{
            $allItem = $itemmp->findArchivedForList('archiveAt','ASC');
        }
        break;
    default:
        $allItem = $itemmp->findArchivedForList('createAt','DESC');
        break;
}

if(null != $url->getRequest('page')){
    $page = base\Validation::checkValidation($url->getRequest('page'), '0-9');
}else{
    $page = 1;
}

$pageAmount = $allItem->rowCount() / OUTPUT_ROW;
$pageAmount = (int)ceil($pageAmount);

$param = '';
foreach($url->getRequest() as $key => $value){
    if('page' == $key){
        continue;
    }
    $param .= $key .'/'. $value .'/';
}

