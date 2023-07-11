<?php
require_once "helpers.php";
require_once "../model/Symposia.php";

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

function DownloadParticipationCertificate(){

	session_start();
	//return "hello...";
	$now = time();
	$startDate = GetUserDates("certificate_issue_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Participation certificates will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate acceptance certificate.
	$counter=0;
	$obj = new DB();
		$query = "select * from contributions where uname='".$_SESSION["username"]."'";
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
					<td>'.'<input type="button" title="'.$row["Title"].'" filename="'.$row["Filename"].'" uname="'.$_SESSION["username"].'" function_name="GenerateCertificate" class="btn btn-primary DownloadCertificate" value="Download"/>'.'</td>
				    </tr>';
		}
		$paperTab.='</table>';

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
