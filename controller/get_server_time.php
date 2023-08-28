<?php
// get_time.php
header("Content-Type: application/json");

$currentTime = time(); // Current server time in seconds since Unix epoch
$refTime = strtotime('2023-12-09');
//echo "Current Time : ".$currentTime." : Ref Time : ".$refTime."<br/>"; 
echo json_encode(array("currtime" => $currentTime,"reftime"=>$refTime));
?>

