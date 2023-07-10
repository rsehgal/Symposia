<?php
require_once "../model/Symposia.php";
require_once "tcpdf_include.php";
function GetReceiptNumber($tablename){
$obj = new DB();
$query = "select count(*) as counter from $tablename";
$result=$obj->GetQueryResult($query);
$row=$result->fetch_assoc();
return $row["counter"];
//return $obj->Counter($tablename);
}

function GeneratePDF($uName,$recType){
//DO NOT WORK WITH SESSIONS
///session_start();
$obj = new DB();
$tablename=$recType."_payment_detail";
$query = "select * from $tablename where uname='".$uName."'";
$result = $obj->GetQueryResult($query);
$row=$result->fetch_assoc();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 009');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);

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

// -------------------------------------------------------------------

// add a page
$pdf->AddPage();

// set JPEG quality
//$pdf->setJPEGQuality(75);

// Example of Image from data stream ('PHP rules')
//$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

// The '@' character is used to indicate that follows an image data stream and not an image file name
//$pdf->Image('@'.$imgdata);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$x = 10;
$y = 30;
$w = 28;
$h = 28;
// Image example with resizing
$pdf->Image('../images/barc.png', $x,$y,$w,$h, 'PNG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', 'B', 18);
$txt="67<sup>th</sup> DAE Symposium on Nuclear Physics <br/>"; 

$pdf->SetFont('times', 'B', 16);
$txt.="December 09-13, 2023 <br/>";
$pdf->SetFont('times', 'B', 14);
$txt.="IIT Indore, Indore, Madhya Pradesh,";
$pdf->writeHTMLCell( 150, 20, 30, 30, $html = $txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );


$words="hello fdfdsfsdf  ... ";
if (extension_loaded('intl')) {
    // Internationalization extension is enabled
    // Your code using NumberFormatter here
$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
$words=$f->format($row["amount"]);
} else {
    // Internationalization extension is not enabled
    // Take appropriate action or display an error message
    //$words = NumberToWords(1234);
}
//$recNum=GetReceiptNumber($tablename);// GetReceiptNumber($uName,$transId,$date,$amount,$recType);
//$words=$f->format((int)$row["amount"]);


$x=170;
$pdf->Image('../images/barc.png', $x,$y,$w,$h, 'PNG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 0, false, false, false);

$recNum=GetReceiptNumber($tablename);
$receiptNum=str_pad($recNum, 4, '0', STR_PAD_LEFT);//GetReceiptNumber($uName);
$pdf->writeHTMLCell( 50, 10, 150, 65, $html = "Receipt No. : ".$receiptNum, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );

$msg='Dear '.$row["name"].', <br/><br/> We hereby acknowledge the receipt of  <u><i> Rupees '.ucwords($words).' only (Rs. '.$row["amount"].'/-)</i></u>  through online  transfer reference number  <u>'.$row["refnum"].'</u>  Dated  <u>'.$row["dateoftrans"].'</u>  against the '.ucfirst($recType).' fees for SNP 2023. ';


$pdf->setCellPadding(0);
$pdf->setFontSpacing(0);

$pdf->WriteHTMLCell(160,100,20,70, $html = $msg, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'J');//, $autopadding = true );
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// test fitbox with all alignment combinations

$horizontal_alignments = array('L', 'C', 'R');
$vertical_alignments = array('T', 'M', 'B');


$sec1="<IMG src='sig_sec.png'><br/>Dr. P. C. Rout<br><i>Secretary</i><br/>SNP-2019"; 
$sec2="Dr. Y. K. Gupta<br><i>Secretary</i><br/>SNP-2019"; 
$sec="Dr. S. K. Pandit<br><i>Secretary</i><br/>SNP-2023";
$conv="Dr. A. Shrivastava<br><i>Convener</i><br/>SNP-2023";

//$imgFile="/home/sympnp/public_html/$sympDir/sig_conv.png";
//$imgFile="images/sign_conv.png";
//$imgFileSec="images/sign_sec.png";

$x=20;
$y=110;

$pdf->Image('../images/signConv.jpg', $x,$y,40,30, 'JPG', '', '', false, 150, '', false, false,0 , false, false, false);
$x=135;
$pdf->Image('../images/signSec.jpg', $x,$y,40,30, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);


$pdf->WriteHTMLCell(50,40,20,140, $html = $sec, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );
$pdf->WriteHTMLCell(50,40,130,140, $html = $conv, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );
$pdf->WriteHTMLCell(190,10,10,170, $html = "<hr/>", $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );


$pdf->SetFont('times', 'I', 10);
$disc="**[As per the eco friendly environment policy of the Government of India, to reduce the burden on paper consumption and carbon footprint, system generated receipts towards registration and 
accommodation fees are to be downloaded, in place of manual receipts ] <br/> (Date format Used : MM/DD/YYYY)";
$pdf->WriteHTMLCell(160,100,20,170, $html = $disc, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C');

$x = 15;
$y = 35;
$w = 30;
$h = 30;

$pdfFileName="receipt_".$uName.".pdf";
$pdf->Output($pdfFileName, 'I');
}
?>
