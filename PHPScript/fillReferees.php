<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../model/Symposia.php";

$obj = new DB();

$Fp=fopen("referees.csv","r"); flock($Fp,LOCK_SH);
$i=0;
//$Line=fgetcsv($Fp); //Skip first line
while (!feof($Fp))
   {
   $Line=fgetcsv($Fp); 
	echo $Line[0]." ".$Line[1]." , ".$Line[3]."<br/>" ;
$query="insert into refereeList values ('".strtoupper($Line[0])."','".$Line[2]."','".$Line[1]."','".$Line[3]."','No')";
    //echo $query."<br/>";
   $obj->GetQueryResult($query);
   }
fclose($Fp);

?>
