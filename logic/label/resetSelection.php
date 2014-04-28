<?php
use \saso\classes\models;

$lcmp = new models\LabelCacheMapper();
$lcmp->deleteAll();

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/deleted/1',TRUE,'303');

