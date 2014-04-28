<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$addedParentId = base\Validation::checkValidation($post->getRequest('addedParentId'),'0-9');
$addCategory = base\Validation::featuresToArray($post->getRequest('categoryName'));

$categorymp = new models\CategoryMapper();
$category = new models\Category();
foreach($addCategory as $value){
    $category->categoryName = $value;
    $categorymp->insert($category, $addedParentId);
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

