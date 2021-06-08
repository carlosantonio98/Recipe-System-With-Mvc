<?php
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('./vendor/tcpdf/tcpdf.php');
require_once("./models/model.platillo.php");

// extend TCPF with custom functions
class MYPDF extends TCPDF {
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('../../../../resources/img/logo.jpg', 33, "Formato de platillo", "Fecha de captura: " . date("Y-m-d"));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

$pdf->Image('resources/img/formatos/formato-platillo.jpg', 25, 30, 160, 210);

// load datas
$id = $_GET['id'];
$platillo->getOne($id);

$pdf->SetXY(68, 32);
$pdf->Cell(110, 20, $platillo->data->IdPlatillo);

$pdf->SetXY(68, 39);
$pdf->Cell(110, 20, $platillo->data->Platillo);

$pdf->SetXY(68, 55);
$pdf->MultiCell(110, 130, $platillo->data->Ingrediente);

$pdf->SetXY(68, 99);
$pdf->MultiCell(110, 160, $platillo->data->Preparacion);

$pdf->SetXY(68, 179);
$pdf->Cell(110, 20, $platillo->data->FechaRegistro);

$pdf->SetXY(68, 187);
$pdf->Cell(110, 20, $platillo->data->HoraRegistro);

$pdf->SetXY(68, 194);
$pdf->Cell(110, 20, $platillo->data->Categoria);

$pdf->SetXY(68, 201);
$pdf->Cell(110, 20, $platillo->data->NombreUsuario);

$pdf->SetXY(68, 208);
$pdf->Cell(110, 20, $platillo->data->Paterno);

$pdf->SetXY(68, 215);
$pdf->Cell(110, 20, $platillo->data->Materno);

$pdf->SetXY(68, 223);
$pdf->Cell(110, 20, $platillo->data->Seguimiento);

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
