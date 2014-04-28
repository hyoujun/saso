<?php
use \saso\classes\base;

$post = new base\Request(new base\Post());

$id = $post->getRequest('id');
$password = base\Password::makeHash($post->getRequest('password'));

$pdo = base\PdoManager::getPdo();
$stmt = $pdo->prepare('
    SELECT id,userName FROM Member
        WHERE id = :id
        AND password = :password
');
$stmt->bindValue(':id', $id, \PDO::PARAM_STR);
$stmt->bindValue(':password', $password, \PDO::PARAM_STR);
$stmt->execute();

$stmt->setFetchMode(\PDO::FETCH_CLASS, '\saso\auth\Member');
$member = $stmt->fetch();
if(null == $member->id){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/',TRUE,'303');
}
$_SESSION['id'] = $member->id;
$_SESSION['time'] = time();
$_SESSION['userName'] = $member->userName;
header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/',TRUE,'303');

