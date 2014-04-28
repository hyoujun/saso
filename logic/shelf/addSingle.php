<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$labelmp = new models\LabelMapper();
$label = $labelmp->findAll();

