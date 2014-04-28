<?php
use \saso\classes\base;
use \saso\classes\models;

$url = new base\Request(new base\UrlParameter());

$labelmp = new models\LabelMapper();
if('' == $url->getRequest('label') || null == $labelmp->findByLabelName($url->getRequest('label'))){
    header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
}
$label = $labelmp->findByLabelName($url->getRequest('label'));

$lcmp = new models\LabelCacheMapper();
$itemmp = new models\ItemMapper();
$colormp = new models\ColorMapper();
$sizemp = new models\SizeMapper();
$detalemp = new models\DetaleMapper();

$sheetsAmount = array();
$detaleCode = array();
foreach($lcmp->findAll() as $key => $value){
    $sheetsAmount[] = $value->sheetsAmount;
}
foreach($lcmp->findAll() as $key => $value){
    for($i = 0; $i < $sheetsAmount[$key]; $i++){
        $detaleCode[] = $value->detaleCode;
    }
}

//tcpdf
require_once 'extention/tcpdf/tcpdf.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp', '', 10);
$pdf->SetMargins($label->marginLeft,$label->marginTop);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage('P','A4');

$colomnlimit = $pdf->getPageWidth() / ($label->width + $label->intervalColomn);
$colomnlimit = (int)$colomnlimit;
$rowlimit = $pdf->getPageHeight() / ($label->height + $label->intervalRow);
$rowlimit = (int)$rowlimit;

$row = 0;
$colomn = 0;
foreach($detaleCode as $value){
    $x = $label->marginLeft + $label->width*$colomn + $label->intervalColomn*$colomn;
    $y = $label->marginTop + $label->height*$row + $label->intervalColomn*$row;
    
    $concatId = $detalemp->findByDetaleCode($value)->concatId;
    $itemName = $itemmp->findByConcatId($concatId)->itemName;
    $paper = $itemmp->findByConcatId($concatId)->paper;
    $paperNote = $itemmp->findByConcatId($concatId)->paperNote;
    $pla = $itemmp->findByConcatId($concatId)->pla;
    $plaNote = $itemmp->findByConcatId($concatId)->plaNote;
    $sizeCode = $detalemp->findByDetaleCode($value)->sizeCode;
    $sizeName = $sizemp->getSizeName($concatId, $sizeCode)->sizeName;
    $colorCode = $detalemp->findByDetaleCode($value)->colorCode;
    $colorName = $colormp->getColorName($concatId, $colorCode)->colorName;
    
    $pdf->MultiCell($label->width, $label->height/12, null, 0, 'C', 0, 1, $x, $y);
    $pdf->MultiCell($label->width, $label->height/6, 
        $itemName . '/' . $colorName . '(' . $colorCode . ') ' . $sizeName, 
    0, 'C', 0, 1, $x);
    $style['padding'] = 3;
    $pdf->write1DBarcode($value, 'C128A',$x,'','',$label->height/4, 0.3, $style, 'N');
    $pdf->MultiCell($label->width, $label->height/12, $value, 0, 'C', 0, 1, $x);
    if($paper != 0){
        $pdf->MultiCell($label->width, $label->height/6, 
            '<img src="' . $this->_linkTo('img/kami.png') . '" width="12">' . $paperNote, 
        0, 'C', 0, 1, $x, '', true, 0, true);
    }
    if($pla != 0){
        $pdf->MultiCell($label->width, $label->height/6, 
            '<img src="' . $this->_linkTo('img/pla.png') . '" width="12">' . $plaNote, 
        0, 'C', 0, 1, $x, '', true, 0, true);
    }

    
    $colomn++;
    if($colomn >= $colomnlimit){
        $row++;
        $colomn = 0;
    }
    if($row >= $rowlimit){
        $row = 0;
        $colomn = 0;
        $pdf->AddPage('P','A4');
    }
}

$pdf->Output("items.pdf", "I");

