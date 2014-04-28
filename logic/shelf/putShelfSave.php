<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$detaleCode = base\Validation::checkValidation($post->getRequest('detaleCodeReal'), '0-9');
$shelfNumber = base\Validation::checkValidation($post->getRequest('detaleCode'), '0-9A-Za-z_-');

$shelfmp = new models\ShelfMapper();
$shelf = new models\Shelf();
$shelf->detaleCode = $detaleCode;
$shelf->shelfNumber = $shelfNumber;
$shelfmp->putShelf($shelf);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/detaleCode/' . $detaleCode . '/shelf/' . $shelfNumber,TRUE,'303');

