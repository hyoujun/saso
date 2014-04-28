<?php
use \saso\classes\models;
use \saso\classes\base;

$url = new base\Request(new base\UrlParameter());
$post = new base\Request(new base\Post);

$itemmp = new models\ItemMapper();
$ivmp = new models\ItemVarMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$categorymp = new models\CategoryMapper();

if(null != $post->getRequest()){
    $allItem = $itemmp->findByItemName($post->getRequest('keyword'));
    $param = 'search/' . $post->getRequest('keyword') .'/';
}elseif(null != $url->getRequest('search')){
    $allItem = $itemmp->findByItemName(urldecode($url->getRequest('search')));
    $param = 'search/' . $url->getRequest('search') . '/';
}else{
    switch($url->getRequest('sortby')){
        case 'concatId':
            if('desc' == $url->getRequest('direction')){
                $allItem = $itemmp->findAllForList('concatId','DESC');
            }else{
                $allItem = $itemmp->findAllForList('concatId','ASC');
            }
            break;
        case 'categoryId':
            if('desc' == $url->getRequest('direction')){
                $allItem = $itemmp->findAllForList('categoryId','DESC');
            }else{
                $allItem = $itemmp->findAllForList('categoryId','ASC');
            }
            break;
        case 'price':
            if('desc' == $url->getRequest('direction')){
                $allItem = $itemmp->findAllForList('price','DESC');
            }else{
                $allItem = $itemmp->findAllForList('price','ASC');
            }
            break;
        case 'createAt':
            if('desc' == $url->getRequest('direction')){
                $allItem = $itemmp->findAllForList('createAt','DESC');
            }else{
                $allItem = $itemmp->findAllForList('createAt','ASC');
            }
            break;
        case 'updateAt':
            if('desc' == $url->getRequest('direction')){
                $allItem = $itemmp->findAllForList('updateAt','DESC');
            }else{
                $allItem = $itemmp->findAllForList('updateAt','ASC');
            }
            break;
        default:
            $allItem = $itemmp->findAllForList('createAt','DESC');
            break;
    }
    $param = '';
}

if(null != $url->getRequest('page')){
    $page = base\Validation::checkValidation($url->getRequest('page'), '0-9');
}else{
    $page = 1;
}

$pageAmount = $allItem->rowCount() / OUTPUT_ROW;
$pageAmount = (int)ceil($pageAmount);

foreach($url->getRequest() as $key => $value){
    if('page' == $key || 'search' == $key){
        continue;
    }
    $param .= $key .'/'. $value .'/';
}

