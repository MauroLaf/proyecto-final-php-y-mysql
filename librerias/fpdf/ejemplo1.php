<?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'�Mi primera p�gina pdf con FPDF!');
$pdf->Output();
?> 