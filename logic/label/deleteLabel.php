<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$labelmp = new models\LabelMapper();
$labelmp->delete($post->getRequest('labelName'));

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

