<?php
use \saso\classes\models;
use \saso\classes\base;

$post = new base\Request(new base\Post());

$detalemp = new models\DetaleMapper();
$lcmp = new models\LabelCacheMapper();
$lc = new models\LabelCache();
foreach($post->getRequest() as $key => $value){
    if(null != $detalemp->findByDetaleCode($key) && '' != $value){
        $lc->detaleCode = $key;
        $lc->sheetsAmount = base\Validation::checkValidation($value, '0-9');
        $lcmp->insert($lc);
    }
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

