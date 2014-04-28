<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$now = base\Password::makeHash($post->getRequest('now'));
$membermp = new models\MemberMapper();
if($now != $membermp->getPasswordById($_SESSION['id'])){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/changePassword/error/now',TRUE,'303');
}
if($post->getRequest('new') != $post->getRequest('confirm')){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/changePassword/error/confirm',TRUE,'303');
}
if(8 > mb_strlen($post->getRequest('new'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/changePassword/error/new',TRUE,'303');
}
if(20 < mb_strlen($post->getRequest('new'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/changePassword/',TRUE,'303');
}
$password = base\Validation::checkValidation($post->getRequest('new'), '0-9a-zA-Z');

$member = new models\Member();
$member->id = $_SESSION['id'];
$member->password = $password;
$membermp->changePassword($member);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/changePassword/success/1',TRUE,'303');

