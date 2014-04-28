<?php
use \saso\classes\base;

$post = new base\Request(new base\Post());

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/detaleCode/' . $post->getRequest('detaleCode'),TRUE,'303');

