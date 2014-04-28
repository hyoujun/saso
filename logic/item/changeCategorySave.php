<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$ivmp = new models\ItemVarMapper();
$iv = new models\ItemVar();
$iv->categoryId = base\Validation::checkValidation($post->getRequest('categoryId'), '0-9');
$iv->concatId =  base\Validation::checkValidation($post->getRequest('concatId'), '0-9');
$iv->updateAt = new \DateTime();
$ivmp->changeCategory($iv);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

