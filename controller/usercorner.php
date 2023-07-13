<?php
require_once "helpers.php";
require_once "../model/Symposia.php";
require_once "../controller/receiptsAndCertificates.php";
function GetUserDates($dateCol){

//return '2023-11-12';

$obj = new DB();
$query = 'select '.$dateCol.' as colname from symposium where volume=67';
$result = $obj->GetQueryResult($query);
$row = $result->fetch_assoc();
$result->free();
return $row["colname"];
}

function GenerateCertificate(){
return "GenerateCertificate called...";
}

function OnlyParticipationCertificate(){
$uName=$_POST["uname"];
$filename=$_POST["filename"];
$title=$_POST["title"];
$category=$_POST["category"];

$obj = new DB();
$query="select Initials,FirstName,LastName,Affiliation from registration where uname='$uName'";
$result=$obj->GetQueryResult($query);
$row= $result->fetch_assoc();

$name=$row["Initials"]." ".$row["FirstName"]." ".$row["LastName"];
$affil=$row["Affiliation"];

//GeneratePDF("rsehgal","registration"); //For Testing
$pdf = new TCPDF();
   
$fontname = TCPDF_FONTS::addTTFfont('DejaVuSans.ttf', 'TrueTypeUnicode', '', 96);

$pdf->AddPage('L');

//Adding background border image
$pdf->Image('../images/border.jpg', 7, 10, 660, 420, 'JPG', '', '', true, '300', '', false, false, 0, false, false, false);
//$pdf->Image('barc_logo_new.png', 23, 25, 32, 32, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
//$pdf->Image('cottonUniv.png', 250, 25, 20, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', 'B', 20);
$pdf->SetTextColor(0, 63, 127);
//$pdf->SetTextColor(0, 0, 255);
$txt="67<sup>th</sup> DAE Symposium on Nuclear Physics, SNP-2023<br/>";

$pdf->writeHTMLCell( 220, 20, 40, 25, $html = $txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );

$pdf->SetFont('times', 'B', 16);
$txt="December 9 - 13, 2023 <br/>IIT Indore, Indore, Madhya Pradesh, India<br/>";
$pdf->writeHTMLCell( 220, 20, 40, 35, $html = $txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );


$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('times', 'BI', 15);

$pdf->SetFont('times', 'B', 21);
$txt="<b><u>Certificate of Participation</u></b>";
//$txt="<b><u>Poster Award</u></b>";
$pdf->SetTextColor(125, 60, 162);
$pdf->writeHTMLCell( 140, 20, 80, 55, $html =$txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );

$msg='<p>This is to certify that <b>'.$name.'</b> from '.$affil.' has participated in the
67<sup>th</sup> DAE Symposium on Nuclear Physics,  sponsored by Board of Research in Nuclear Sciences, held at IIT Indore, Indore, Madhya Pradesh, during December 09-13, 2023.';

$pdf->setCellPadding(0);
$pdf->setFontSpacing(0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', 'I', 20);


$pdf->WriteHTMLCell(245,60,25,68, $html = $msg, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'J');//, $autopadding = true );

//Signatures

$sec1="<IMG src='sig_sec.png'><br/>Dr. P. C. Rout<br><i>Secretary</i><br/>SNP-2019";
$sec2="Dr. Y. K. Gupta<br><i>Secretary</i><br/> SNP-2019";
$sec="Dr. S. K. Pandit<br><i>Secretary</i>, SNP-2023";
$conv="Dr. A. Shrivastava<br><i>Convener</i>, SNP-2023";


$x=30;
$y=125;

$pdf->Image('../images/signConv.jpg', $x,$y,40,30, 'JPG', '', '', false, 150, '', false, false,0 , false, false, false);
$x=225;
$pdf->Image('../images/signSec.jpg', $x,$y,40,30, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);


$pdf->WriteHTMLCell(60,40,20,150, $html = $sec, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );
$pdf->WriteHTMLCell(60,40,215,150, $html = $conv, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );

$pdfFileName="cert_".$uName.".pdf";
$pdf->Output($pdfFileName, 'I');

}

function DownloadParticipationCertificate(){
$uName=$_POST["uname"];
$filename=$_POST["filename"];
$title=$_POST["title"];
$category=$_POST["category"];

$obj = new DB();
$query="select Initials,FirstName,LastName,Affiliation from registration where uname='$uName'";
$result=$obj->GetQueryResult($query);
$row= $result->fetch_assoc();

$name=$row["Initials"]." ".$row["FirstName"]." ".$row["LastName"];
$affil=$row["Affiliation"];

//GeneratePDF("rsehgal","registration"); //For Testing
$pdf = new TCPDF();
   
$fontname = TCPDF_FONTS::addTTFfont('DejaVuSans.ttf', 'TrueTypeUnicode', '', 96);

$pdf->AddPage('L');

//Adding background border image
$pdf->Image('../images/border.jpg', 7, 10, 660, 420, 'JPG', '', '', true, '300', '', false, false, 0, false, false, false);
//$pdf->Image('barc_logo_new.png', 23, 25, 32, 32, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
//$pdf->Image('cottonUniv.png', 250, 25, 20, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', 'B', 20);
$pdf->SetTextColor(0, 63, 127);
//$pdf->SetTextColor(0, 0, 255);
$txt="67<sup>th</sup> DAE Symposium on Nuclear Physics, SNP-2023<br/>";

$pdf->writeHTMLCell( 220, 20, 40, 25, $html = $txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );

$pdf->SetFont('times', 'B', 16);
$txt="December 1 - 5, 2022 <br/>Cotton University, Guwahati, Assam, India<br/>";
$pdf->writeHTMLCell( 220, 20, 40, 35, $html = $txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );


$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('times', 'BI', 15);

$pdf->SetFont('times', 'B', 21);
$txt="<b><u>Certificate of Participation</u></b>";
//$txt="<b><u>Poster Award</u></b>";
$pdf->SetTextColor(125, 60, 162);
$pdf->writeHTMLCell( 140, 20, 80, 55, $html =$txt, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = 'C', $autopadding = true );




$pdfFileName="cert_".$uName.".pdf";
$pdf->Output($pdfFileName, 'I');

}

/*function RegisteredUser(){
 	session_start();
	$obj = new DB();
	$query = "select * from registration where uname='".$_SESSION["username"]."'";
	$counter = $obj->GetCounterFromQuery($query);
	return $counter;

}*/

function DownloadCertificate(){

	session_start();
	$certType= $_POST["allotmentType"];
	//return "hello...";
	$now = time();
	$startDate = GetUserDates("certificate_issue_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Participation certificates will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate acceptance certificate.
	if(!RegisteredUser()){
		return Message("It seems you had not registered for symposium, Kindly contact Secretary","alert-danger");
	}

	$counter=0;
	$obj = new DB();
		$query = "select * from contributions where uname='".$_SESSION["username"]."'";

		$counter = $obj->GetCounterFromQuery($query);
		if($counter==0){
		 $certType="OnlyParticipationCertificate";
		 $onlyCert='<table class="table table-bordered">
			    <tr><td>Click the button to download your particiption certificate</td>';
		$onlyCert.='<td><input type="button" uname="'.$_SESSION["username"].'" function_name="'.$certType.'" class="btn btn-primary DownloadCertificate" value="Download"/></td></tr></table>';
		$paperTab=$onlyCert;
		}else{
		$result = $obj->GetQueryResult($query);
		
		$paperTab='<table class="table table-stripped">';
		$paperTab.='<tr>
				<th>S. No.</th>
				<th>Title</th>
				<th>Status</th>
				<th>Download Certificate</th>
			    </tr>';

		while($row = $result->fetch_assoc()){
			$counter++;
			if($row["status"]==="Deleted" || $row["status"]==="Rejected")
				$paperTab.='<tr class="tr-peach" >';
			else
				$paperTab.='<tr class="tr-lightgreen">';
			
			$paperTab.='	<td>'.$counter.'</td>
					<td>'.$row["Title"].'</td>
					<td>'.$row["status"].'</td>
					<td>'.'<input type="button" category="'.$row["Topic"].'" title="'.$row["Title"].'" filename="'.$row["Filename"].'" uname="'.$_SESSION["username"].'" function_name="'.$certType.'" class="btn btn-primary DownloadCertificate" value="Download"/>'.'</td>
				    </tr>';
		}
		$paperTab.='</table>';
		}
	

		$associatedJS = '<script>
					$(function(){
						var data={};
						$(".DownloadCertificate").click(function(){
							$("pdfIframe").hide();
							var funcName = $(this).attr("function_name");
							data["function_name"]=funcName;
							data["uname"]=$(this).attr("uname");
							data["filename"]=$(this).attr("filename");
							data["title"]=$(this).attr("title");
							data["category"]=$(this).attr("category");
							
							
							alert(funcName);
							console.log(data);
							$.ajax({
							    //url: "../controller/policy.pdf",
							    url: "../controller/func.php",
							    method: "POST",
							    data : data,
							    xhrFields: {responseType: "blob"},
							    success: function(response) {
								//alert("HELLO...");
							    	//$("#result").html(response);
								$("#pdfIframe").show();
									var reader = new FileReader();
									reader.onloadend = function() {
									$("#pdfIframe").attr("src", reader.result);
									};
									reader.readAsDataURL(response);
								}
							});
						});
					});
				 </script>';
		return $paperTab.$associatedJS;

		//return "Current STatus : ".$row["status"]."<br/>";
	}
}

function DownloadAcceptanceCertificate(){

	//return "hello...";
	$now = time();
	$startDate = GetUserDates("contrib_acc_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Acceptance certificates will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate participation certificate.
	}
}

function DownloadRegistrationReceipt(){

	//return "hello...";
	$now = time();
	$startDate = GetUserDates("receipt_issue_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Registration recipts will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate registration receipt.
	}
}

function DownloadAccommodationReceipt(){

	//return "hello...";
	$now = time();
	$startDate = GetUserDates("receipt_issue_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Accommodation receipts will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate accommodation receipt.
	}
}

?>
