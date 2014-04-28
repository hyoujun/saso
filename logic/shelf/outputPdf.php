<?php
use \saso\classes\base;
use \saso\classes\models;

$post = new base\Request(new base\Post());

foreach($post->getRequest() as $key => $value){
    if('labelName' == $key){
        continue;
    }
    $number[$key] = base\Validation::checkValidation($value, '0-9A-Za-z-');
}
$labelmp = new models\LabelMapper();
$label = $labelmp->findByLabelName($post->getRequest('labelName'));

//tcpdf
require_once 'extention/tcpdf/tcpdf.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp', '', 20);
$pdf->SetMargins($label->marginLeft,$label->marginTop);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage('P','A4');

$colomnlimit = $pdf->getPageWidth() / ($label->width + $label->intervalColomn);
$colomnlimit = (int)$colomnlimit;
$rowlimit = $pdf->getPageHeight() / ($label->height + $label->intervalRow);
$rowlimit = (int)$rowlimit;

$row = 0;
$colomn = 0;
foreach($number as $value){
    $x = $label->marginLeft + $label->width*$colomn + $label->intervalColomn*$colomn;
    $y = $label->marginTop + $label->height*$row + $label->intervalColomn*$row;
        
    $pdf->MultiCell($label->width, $label->height/12, null, 0, 'C', 0, 1, $x, $y);
    $pdf->MultiCell($label->width, 22, 
        $value, 
    0, 'L', 0, 1, $x+5);
    $style['padding'] = 4;
    $pdf->write1DBarcode($value, 'C128A',$x,$label->height/12+12+$y,'',$label->height*5/12,0.3,$style,'N');
    
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

$pdf->Output("shelf.pdf", "I");

