<?php    
use \saso\classes\base;
require_once '../config.php';
require_once '../autoload.php';

$post = new base\Request(new base\Post());
$error = '';
$errorMessage = array();

if('' == $post->getRequest('name')){
    $error = 1;
    $errorMessage[] = 'お名前が空欄です。';
}
if(8 > mb_strlen($post->getRequest('id'))
    || 8 > mb_strlen($post->getRequest('password'))
){
    $error = 1;
    $errorMessage[] = 'ログインIDまたはパスワードが短すぎます。';
}
if(50 < mb_strlen($post->getRequest('name'))
    || 20 < mb_strlen($post->getRequest('id'))
    || 20 < mb_strlen($post->getRequest('password'))
){
    $error = 1;
    $errorMessage[] = '文字数が不正です。';
}
if($post->getRequest('password') != $post->getRequest('password_confirm')){
    $error = 1;
    $errorMessage[] = 'パスワードが一致しません。';
}

try{
    $id = base\Validation::checkValidation($post->getRequest('id'), '0-9a-zA-Z-_');
    $password = base\Validation::checkValidation($post->getRequest('password'), '0-9a-zA-Z');
}catch(\Exception $e){
    $errorMessage[] = '文字が不正です。';
    $view = 'errorView.php';
    require_once 'temp.php';
    die();
}

if(1 == $error){
    $view = 'errorView.php';
}else{
    require_once 'createTables.php';
    $view = 'installResultView.php';
}
require_once 'temp.php';

