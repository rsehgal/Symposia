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

function DownloadAcceptanceCertificate(){

	//return "hello...";
	$now = time();
	$startDate = GetUserDates("contrib_acc_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Acceptance certificates will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
}
	else{
	//TODO : LOGIC to generate acceptance certificate.
	}
}

function DownloadParticipationCertificate(){

	//return "hello...";
	$now = time();
	$startDate = GetUserDates("contrib_acc_date");
	$acc_time = GetStartTime($startDate);
	if($now < $acc_time){
		return Message("Participation certificates will be released on ".date("d-M-Y",strtotime($startDate)),"alert-info");
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
