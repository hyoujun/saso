<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time() -3600, '/');
}
session_destroy();

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/',TRUE,'303');

