<?php
use \saso\classes\models;
use \saso\classes\base;

$post = new base\Request(new base\Post());

$labelmp = new models\LabelMapper();
$label = new models\Label();
$label->labelName = base\Validation::checkValidation($post->getRequest('labelName'), '0-9a-zA-Z-_');
$label->marginTop = base\Validation::checkValidation($post->getRequest('marginTop'), '0-9.');
$label->marginLeft = base\Validation::checkValidation($post->getRequest('marginLeft'), '0-9.');
$label->width = base\Validation::checkValidation($post->getRequest('width'), '0-9.');
$label->height = base\Validation::checkValidation($post->getRequest('height'), '0-9.');
$label->intervalColomn = base\Validation::checkValidation($post->getRequest('intervalColomn'), '0-9.');
$label->intervalRow = base\Validation::checkValidation($post->getRequest('intervalRow'), '0-9.');
$labelmp->insert($label);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

