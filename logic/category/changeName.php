<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$categorymp = new models\CategoryMapper();
$category = new models\Category();
$category->categoryName = $post->getRequest('categoryName');
$category->categoryId = $post->getRequest('categoryId');
$categorymp->update($category);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

