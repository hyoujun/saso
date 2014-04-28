<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$categorymp = new models\CategoryMapper();
if('childrenPromote' == $post->getRequest('method')){
    $categorymp->delete($post->getRequest('categoryId'));
}elseif('withChildren' == $post->getRequest('method')){
    $categorymp->deleteWithChildren($post->getRequest('categoryId'));
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

