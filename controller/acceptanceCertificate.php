<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// Include the TCPDF library
//require_once('tcpdf/tcpdf.php');
require_once('tcpdf_include.php');

class MYPDF extends TCPDF {

	//Page header
	function Header() {
		// Logo
		$image_file = '../images/snp.jpg';
		$this->Image($image_file, 10, 10, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 13);
		// Title
		//$this->MultiCell(5, 15, 'DAE Symposium On Nuclear Physics', 0, false, 'L', 0, '', 0, false, 'M', 'M');
		$this->MultiCell(3, 5, '', 0, 'L', 0, 0, '', '', true);
		//$this->MultiCell(180, 5, gettDate(1), 0, 'L', 0, 1, '', '', true);
		$this->MultiCell(180, 5, 'DAE Symposium on Nuclear Physics', 0, 'L', 0, 1, '', '', true);

		$this->SetFont('helvetica', 'IB', 10);
		//$this->MultiCell(5, 15, 'December 20 - 24, 2010'."\n".'Birla Institute of Technology & Science, Pilani, Rajasthan, India -333 031'."\n".'www.sympnp.org/snp2010', 0, false, 'L', 0, '', 0, false, 'M', 'M');
		$this->MultiCell(28, 5, '', 0, 'L', 0, 0, '', '', true);
		//$text=getSympDuration(gettDate(3),gettDate(4))."\n".gettDate(2)."\n".'www.sympnp.org/'.gettDate(22);
		$text="December 09-13, 2023"."\n".'www.sympnp.org';//.gettDate(22);
		$this->MultiCell(150, 5, $text, 0, 'L', 0, 1, '', '', true);
		$this->SetFont('helvetica', 'IB', 10);
		$spon='Sponsored by BRNS, Department of Atomic Energy, Govt. of India';
		$this->MultiCell(28, 5, '', 0, 'L', 0, 0, '', '', true);
		$this->MultiCell(150, 5, $spon, 0, 'L', 0, 1, '', '', true);

//"December 20 - 24, 2010\nBirla Institute of Technology & Science, Pilani, Rajasthan, India -333 031\nwww.sympnp.org/snp2010"
	}

	// Page footer
	function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-35);
		// Set font
		$this->SetFont('helvetica', 'I', 10);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
        $chai= 'Chairperson'."\n".'Dr. B. K. Nayak'."\n".'Tel: +91-22-2559-2609'."\n".'Email:bknayak@barc.gov.in';
        //$conv= 'Convener'."\n".gettDate(28)."\nTel: ".gettDate(30)."\nEmail: ".gettDate(29);
        //$secr1= 'Secretary'."\n".gettDate(31)."\nTel: ".gettDate(33)."\nEmail: ".gettDate(32);
        //$secr2= 'Secretary'."\n".gettDate(44)."\nTel: ".gettDate(33)."\nEmail: ".gettDate(45);
	}
}




function DownloadAcceptanceCertificate(){

$Title = $_POST['title'];
$AuthorList="Raman Sehgal_Ayush Sehgal";//$_POST['authorlist'];
$Status=$_POST['status'];
$Type="C";//$_POST['type'];
$AuthorFirstNamesList=explode(",",$_POST['firstnames']);
$AuthorLastNamesList=explode(",",$_POST['lastnames']);;
//$authors="Raman Sehgal";
$authors=$AuthorFirstNamesList[0]." ".$AuthorLastNamesList[0];
for($i = 1 ; $i < count($AuthorFirstNamesList) ; $i++){
	if($i===(count($AuthorFirstNamesList)-1))
		$authors.=" and ".$AuthorFirstNamesList[$i]." ".$AuthorLastNamesList[$i];
	else
		$authors.=", ".$AuthorFirstNamesList[$i]." ".$AuthorLastNamesList[$i];
}

// Create a new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf->AddPage();
// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Paper Acceptance Certificate');
$pdf->SetSubject('Paper Acceptance Certificate');
$pdf->SetKeywords('Certificate, Acceptance, Paper');
//$image_file = 'snp.png';
//$pdf->Image('snp.jpg', 10, 10, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetFont('helvetica', '', 12, '', true);

// add a page
$pdf->AddPage();
$linestyle = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '', 'phase' => 0, 'color' => array(0, 0, 0));
$pdf->Line(25, 40, 195, 40, $linestyle);

$pdf->Ln(20);

$Text='<p>Dear Author,';
//$Text.='<p>The Organizing Committee of the '.gettDate(1).' ('.$sympDir.') is very happy'; 
$Text.='<p>The Organizing Committee of the Symposium is very happy'; 
$Text.=' to inform you that the paper entitled<br/>';
$Text.="<i><b>$Title</b></i>".'<br/>';
$Text.='by '.$authors.'<br/>';
//$Text.='by '.strtr($AuthorList,'_',' ').'<br/>';
/*if($Type=='Contributed Paper')
 $Text.="has been accepted for <b>$Status presentation</b>.";
else if($Type=='Thesis Presentation')
 $Text.="has been accepted for <b>$Type</b>.";
 */
//$Text.="has been accepted for presentation.";

$Text.="has been accepted for <b>$Status</b>  presentation.";

if($Type==='C'){
if($Status=='Oral') 
  $Text.='<p>Please note that the duration of Oral Presentation is 8+2 minutes including discussion';
//if($Status=='Poster') 
else
  $Text.='<p>Please note that the poster size should not exceed 95cm x 95cm.';
}
$Text.='<p>Actual date and time of your presentation will be announced later, after the programme is finalised.';
$Text.='<p>Looking forward to see you.';
$Text.='<p>On behalf of the Organizing Committee<br/><br/>';



//$Text.='<IMG src="../images/signSec.jpg" border="0"><br/>
//'.gettDate(44).'<br/>Secretary, '.$sympDir;  
//$Text.='<p>On behalf of the Organizing Committee<br/><br/><br/>';//.gettDate(31).'<br/>Secretary, '.$sympDir;  

//$Text.='<br/><br/><br/><br/><br/><p>SAVE PAPER- Please do not print this unless necessary.';


// Add a page
//$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Insert content
/*
$content = '
<h1>Paper Acceptance Certificate</h1>
<p>This is to certify that [Author Name]\'s paper titled "[Paper Title]" has been accepted for presentation at [Conference Name].</p>
<p>Date: [Date]</p>
<p>Signature:</p>
';
*/
$content=$Text;
//$pdf->writeHTML$content, true, false, true, false, '');
//$pdf->writeHTML(0, 0, '', '', $content, 0, 1, 0, true, '', true);
$pdf->writeHTML($Text, true, 0, true, true);

$pdf->Image('../images/signSec.jpg', 10, 145, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$secText="<br/><br/><br/><br/>Dr. S. K. Pandit,<br/>Secretary,<br/>SNP-2023";
//$pdf->Ln(100);
$pdf->writeHTML($secText, true, 0, true, true);


// Output the PDF as a file or inline in the browser

$pdf->Ln(40);
$warningText='SAVE PAPER- Please do not print this unless necessary.';
$pdf->writeHTML($warningText, true, 0, true, true);
$pdf->Output('paper_acceptance_certificate.pdf', 'I');

}
//DownloadAcceptanceCertificate();
?>
