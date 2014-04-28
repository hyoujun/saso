<?php
use \saso\classes\base;
mb_internal_encoding('UTF-8');
require_once 'config.php';
require_once 'autoload.php';

session_start();
$authpost = new base\Request(new base\Post());
if(null != $authpost->getRequest() && 'i_came_from_auth' == $authpost->getRequest('auth')){
    session_regenerate_id(true);
    require_once 'auth/auth.php';
}
if(isset($_SESSION['id']) && $_SESSION['time'] + 900 > time()){
    $_SESSION['time'] = time();
    $dispatcher = new base\Dispatcher();
    $dispatcher->setSystemRoot(DOCUMENT_ROOT . PROGRAM_DIR);
    $dispatcher->dispatch();
}else{
    require_once 'auth/temp.php';
}

