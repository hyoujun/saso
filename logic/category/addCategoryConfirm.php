<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$categorymp = new models\CategoryMapper();

$addedParentId = base\Validation::checkValidation($post->getRequest('addedParentId'),'0-9');
$addCategory = base\Validation::featuresToArray($post->getRequest('categoryName'));
$path = base\Validation::checkValidation($post->getRequest('path'),'0-9,');
$pathArray = base\Validation::featuresToArray($path);
