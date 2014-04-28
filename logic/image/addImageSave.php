<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$colormp = new models\ColorMapper();
$color = new models\Color();
$color->concatId = $post->getRequest('concatId');
$color->colorCode = $post->getRequest('colorCode');
$color->colorName = 'dummy';
$color->image = fopen($_FILES['image']['tmp_name'], 'rb');
$color->imageType = $_FILES['image']['type'];
$colormp->uploadImage($color);

$ivmp = new models\ItemVarMapper();
$iv = new models\ItemVar();
$iv->concatId = $post->getRequest('concatId');
$iv->updateAt = new \Datetime();
$ivmp->update($iv);

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/item/start/',TRUE,'303');

