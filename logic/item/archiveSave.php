<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

$archivemp = new models\ArchiveMapper();
$archive = new models\Archive();
$detalemp = new models\DetaleMapper();
$qlmp = new models\QuantityLogMapper();
foreach($post->getRequest() as $concatId => $archiveNote){
    $archive->concatId = $concatId;
    $archive->archiveNote = $archiveNote;
    $archive->archiveAt = new \DateTime();
    $archivemp->setArchive($archive);
    foreach($detalemp->findByConcatId($concatId) as $detale){
        $qlmp->delete($detale->detaleCode);
    }
}

header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');

